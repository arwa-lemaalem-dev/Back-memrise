<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{

    public function test_add_task_success()
    {
        $task = [
            "title" => "gestion des utilisateurs",
            "project_id" => "4",
        ];
        $response = $this->withHeaders(['Accept' => 'application/json', 'Authorization' => 'Bearer 5|4sxc61QZMR5jma6Vq8pxbDVvt1WUqTZKZQB0GiPc'])
            ->post(
                config('memrise.APP_URL') . '/api/tasks-project/add-task',
                $task
            );
        $response->assertJson([
            'status' => 201,
        ]);
    }

    public function test_add_task_failure()
    {
        $task = [
            "title" => "gestion des utilisateurs",
            "project_id" => "2",
        ];
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post(
                config('memrise.APP_URL') . '/api/tasks-project/add-task',
                $task
            );
        $response->assertStatus(200);
    }
}
