<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_project_success()
    {
        $project = [
            'name_project' => 'mattel',
            'url' => 'https://localhost/p3530_mattel_selfcare/public/account/index#?',
            'deadline'=>'2022-06-30',
            'id'=>4
        ];
        $response = $this->withHeaders(['Accept' => 'application/json','Authorization'=>'Bearer 5|4sxc61QZMR5jma6Vq8pxbDVvt1WUqTZKZQB0GiPc'])
            ->post(
                config('memrise.APP_URL') . '/api/project/create-project',
                $project
            );
        $response->assertStatus(200);
    }

    public function test_add_project_failure()
    {
        $project = [
            'name_project' => 'mattel',
            'deadline'=>'2022-06-30',
            'id'=>4
        ];
        $response = $this->withHeaders(['Accept' => 'application/json','Authorization'=>'Bearer 5|4sxc61QZMR5jma6Vq8pxbDVvt1WUqTZKZQB0GiPc'])
            ->post(
                config('memrise.APP_URL') . '/api/project/create-project',
                $project
            );
        $response->assertStatus(200);
    }

    public function test_delete_project_success()
    {
        $response = $this->withHeaders(['Accept' => 'application/json','Authorization'=>'Bearer 5|4sxc61QZMR5jma6Vq8pxbDVvt1WUqTZKZQB0GiPc'])
            ->post(
                config('memrise.APP_URL') . '/api/project/delete-project',['project_id'=>1]
            );
        $response->assertStatus(200);
    }

    public function test_delete_project_failure()
    {
        $response = $this->withHeaders(['Accept' => 'application/json','Authorization'=>'Bearer 5|4sxc61QZMR5jma6Vq8pxbDVvt1WUqTZKZQB0GiPc'])
            ->post(
                config('memrise.APP_URL') . '/api/project/delete-project',['project_id'=>20]
            );
        $response ->assertJson([
            'status' => 404,
        ]);
    }

}
