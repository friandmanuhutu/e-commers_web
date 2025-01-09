<?php
namespace Tests\Feature;

use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    /**
     * Test login admin dengan data valid.
     */
    public function test_admin_login_success()
    {
        $response = $this->post('/login', [
            'email' => 'hammamjauharul@gmail.com',
            'password' => 'admin123',
        ]);

        // Assert bahwa user berhasil login
        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();
    }

    /**
     * Test login admin dengan data tidak valid.
     */
    public function test_admin_login_failed()
    {
        $response = $this->post('/login', [
            'email' => 'hammamjauharul@gmail.com',
            'password' => 'admin321',
        ]);

        // Assert bahwa user gagal login
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
