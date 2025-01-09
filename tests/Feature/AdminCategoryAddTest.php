<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class AdminCategoryAddTest extends TestCase
{
    /**
     * Test admin login terlebih dahulu.
     */
    private function loginAsAdmin()
    {
        $this->post('/login', [
            'email' => 'hammamjauharul@gmail.com',
            'password' => 'admin123', 
        ]);

        // admin diarahkan ke dashboard admin setelah login
        $this->assertAuthenticatedAs(\App\Models\User::where('email', 'hammamjauharul@gmail.com')->first());
    }

    /**
     * Test admin berhasil menambahkan kategori.
     */
    public function test_admin_add_category_success()
    {
        // Login sebagai admin
        $this->loginAsAdmin();

        // Akses menu kategori
        $response = $this->get('/view_category');
        $response->assertStatus(200); 

        // Simulasi penambahan kategori
        $response = $this->post('/add_category', [
            'category' => 'Furniture', 
        ]);

        // Memastikan penambahan kategori berhasil
        $response->assertRedirect('/view_category'); // Redireksi setelah sukses
        $this->assertDatabaseHas('categories', [
            'category_name' => 'Furniture', 
        ]);
    }

    /**
     * Test admin gagal menambahkan kategori
     */
    public function test_admin_add_category_failed()
    {
        // Login sebagai admin
        $this->loginAsAdmin();

        // Akses menu kategori
        $response = $this->get('/view_category');
        $response->assertStatus(200); 

        // Memastikan kategori sudah ada di database menggunakan model Eloquent
        \App\Models\Category::create([
            'category_name' => 'Furniture', // Nama kategori yang akan diuji
        ]);

        try {
            // Simulasi penambahan kategori yang sama
            $response = $this->post('/add_category', [
                'category' => 'Furniture', // Nama kategori yang sudah ada
            ]);

            // Gagal jika tidak ada exception
            $this->fail('Expected UniqueConstraintViolationException not thrown.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Memastikan exception adalah duplikasi data
            $this->assertStringContainsString('Duplicate entry', $e->getMessage());

            // Test passed karena duplikasi terdeteksi
            $this->assertTrue(true);
        }
    }


}
