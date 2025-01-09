<?php
namespace Tests\Feature;

use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * Test login user dengan data valid.
     */
    public function test_user_login_success()
    {
        $response = $this->post('/login', [
            'email' => 'sinlots20@gmail.com',
            'password' => 'user12345',
        ]);

        // Assert bahwa user berhasil login
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    /**
     * Test login user dengan data tidak valid.
     */
    public function test_user_login_failed()
    {
        $response = $this->post('/login', [
            'email' => 'sinlots20@gmail.com',
            'password' => 'user54321',
        ]);

        // Assert bahwa user gagal login
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
