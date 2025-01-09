<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class UserLoginAndPaymentTest extends TestCase
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
     * Test pembayaran user setelah login berhasil.
     */
    public function test_user_payment_success()
    {
        // Login user
        $response = $this->post('/login', [
            'email' => 'sinlots20@gmail.com',
            'password' => 'user12345',
        ]);

        // Assert bahwa user berhasil login
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();

        // Persiapkan data pembayaran
        $paymentData = [
            'amount' => 1000, // contoh pembayaran Rp10.000 (dalam satuan cent)
            'currency' => 'idr',
        ];

        // Mocking Stripe PaymentIntent
        $paymentIntentMock = Mockery::mock('alias:' . PaymentIntent::class);
        $paymentIntentMock->shouldReceive('create')
            ->with($paymentData)
            ->andReturn((object) ['client_secret' => 'sample_client_secret']);

        // Lakukan permintaan ke API pembayaran
        $paymentResponse = $this->post('/api/payment', $paymentData);

        // Assert bahwa response pembayaran berhasil dan client secret ada
        $paymentResponse->assertStatus(200);
        $paymentResponse->assertJson([
            'clientSecret' => 'sample_client_secret',
        ]);
    }

    /**
     * Test pembayaran user gagal setelah login.
     */
    public function test_user_payment_failed()
    {
        // Login user
        $response = $this->post('/login', [
            'email' => 'sinlots20@gmail.com',
            'password' => 'user12345',
        ]);

        // Assert bahwa user berhasil login
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();

        // Persiapkan data pembayaran yang salah
        $paymentData = [
            'amount' => 1000, // contoh pembayaran Rp10.000 (dalam satuan cent)
            'currency' => 'idr',
        ];

        // Mocking Stripe PaymentIntent untuk gagal
        $paymentIntentMock = Mockery::mock('alias:' . PaymentIntent::class);
        $paymentIntentMock->shouldReceive('create')
            ->with($paymentData)
            ->andThrow(new \Exception("Payment failed"));

        // Lakukan permintaan ke API pembayaran
        $paymentResponse = $this->post('/api/payment', $paymentData);

        // Assert bahwa response gagal dengan error
        $paymentResponse->assertStatus(500);
        $paymentResponse->assertJson([
            'error' => 'Payment failed',
        ]);
    }
}
