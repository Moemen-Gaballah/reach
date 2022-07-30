<?php

namespace Modules\Advertiser\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
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

    public function testSuccessfulRegistration()
    {
        $categoryData = [
            "name" => "Category01",
        ];

        $this->json('POST', 'api/categories', $categoryData, ['Accept' => 'application/json'])
            ->assertStatus(201)
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
