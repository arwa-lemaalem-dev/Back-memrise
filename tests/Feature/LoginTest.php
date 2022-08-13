<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_success()
    {
        $user = [
            'email' => 'media@gmail.com',
            'password' => 'PassW0rd!'
        ];
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post(
                config('memrise.APP_URL') . '/api/user/login',
                $user
            );

        $response->assertStatus(200);
    }

    public function test_login_failure()
    {
        $user = [
            'email' => 'media123',
            'password' => 'PassW0rd!'
        ];
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post(
                config('memrise.APP_URL') . '/api/user/login',
                $user
            );
        $response->assertStatus(404);
    }
}