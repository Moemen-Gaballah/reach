<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRequiredFieldsForStoreCategory()
    {
        $this->json('POST', 'api/categories', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                ]
            ]);
    }

    public function testSuccessfulStoreCategory()
    {
        $categoryData = [
            "name" => "Category". rand(10000,999999).time(), // TODO set Database for test
        ];

        $this->json('POST', 'api/categories', $categoryData, ['Accept' => 'application/json'])
            ->assertStatus(200) // TODO 201 for created
            ->assertJsonStructure([
                "success",
                "data" => [
                    'id',
                    'name',
                ],
                "message"
            ]);
    }
}
