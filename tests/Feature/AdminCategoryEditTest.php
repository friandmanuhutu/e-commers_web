<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class AdminCategoryEditTest extends TestCase
{
    /**
     * Testedit kategori.
     */
    public function test_edit_category_success()
    {
        // Login sebagai admin 
        $response = $this->post('/login', [
            'email' => 'hammamjauharul@gmail.com',
            'password' => 'admin123',
        ]);

        // Assert bahwa login berhasil dan admin diarahkan ke dashboard
        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs(User::where('email', 'hammamjauharul@gmail.com')->first());

        // Buat kategori baru untuk diuji edit
        $category = Category::create([
            'category_name' => 'Fashion',
        ]);

        // Cek apakah kategori berhasil dibuat
        $this->assertDatabaseHas('categories', [
            'category_name' => 'Fashion',
        ]);

        // Akses halaman edit kategori
        $response = $this->get('/edit_category/' . $category->id);
        $response->assertStatus(200); // Pastikan halaman edit ditampilkan dengan status 200

        // Kirim request untuk mengubah kategori
        $response = $this->post('/update_category/' . $category->id, [
            'category' => 'Aksesoris',  // Mengubah nama kategori
        ]);

        // Assert bahwa kategori telah berhasil diupdate
        $this->assertDatabaseHas('categories', [
            'category_name' => 'Aksesoris',
        ]);
        
        // Cek jika halaman redirect ke view kategori setelah update
        $response->assertRedirect('/view_category');
    }

    public function test_edit_category_fail()
    {
        try {
            // Login sebagai admin
            $response = $this->post('/login', [
                'email' => 'hammamjauharul@gmail.com',
                'password' => 'admin123',
            ]);

            // Pastikan login berhasil
            $response->assertRedirect('/admin/dashboard');
            $this->assertAuthenticated();

            // Buat kategori pertama "Makanan & Minuman"
            $category1 = Category::create([
                'category_name' => 'Makanan & Minuman',
            ]);

            // Buat kategori kedua "Elektronik"
            $category2 = Category::create([
                'category_name' => 'Elektronik',
            ]);

            // Update kategori dengan nama yang sudah ada
            $response = $this->post('/update_category/' . $category1->id, [
                'category' => 'Elektronik', // Nama kategori yang sudah ada
            ]);

            // Periksa jika respons berhasil, seharusnya gagal
            $this->fail('Kategori dapat diupdate meskipun ada duplikasi nama');
            
        } catch (\Exception $e) {
            // Tangani exception jika duplikasi kategori terjadi (biasanya SQLSTATE[23000] untuk duplikasi)
            if ($e->getCode() == '23000') {
                // Cek database bahwa kategori pertama tetap ada
                $this->assertDatabaseHas('categories', [
                    'category_name' => 'Makanan & Minuman',
                ]);

                // Cek bahwa kategori kedua masih ada
                $this->assertDatabaseHas('categories', [
                    'category_name' => 'Elektronik',
                ]);
            } else {
                // Jika ada exception lain, re-throw exception tersebut
                throw $e;
            }
        }
    }




}
