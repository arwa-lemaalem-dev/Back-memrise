<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_success()
    {
        $user = [
            "name" => "arwa",
            "password" => "PassW0rd!",
            "email" => "arwa@gmail.com"
        ];
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post(
                config('memrise.APP_URL') . '/api/user/register',
                $user
            );
        $response->assertStatus(200);
    }

    public function test_register_failure()
    {
        $user = [
            "name" => "arwa",
            "email" => "arwa@gmail.com"
        ];
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post(
                config('memrise.APP_URL') . '/api/user/register',
                $user
            );
        $response->assertStatus(200);
    }
}