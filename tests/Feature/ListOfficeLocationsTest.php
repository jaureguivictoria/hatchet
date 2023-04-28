<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListOfficeLocationsTest extends TestCase
{
    public function test_can_list_empty_office_locations(): void
    {
        $response = $this->getJson('/api/office_locations');

        $response->assertJsonStructure([
            'data' => [],
            'links' => [
                'first',
                'last',
                'prev',
                'next',
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'path',
                'per_page',
                'to',
                'total',
            ]
        ]);

        $response->assertJsonCount(0, 'data');

        $response->assertStatus(200);
    }

    public function test_can_list_office_locations(): void
    {
        $this->seed();

        $response = $this->getJson('/api/office_locations');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [[
                'id',
                'name',
                'price',
                'offices',
                'tables',
                'sqmt',
            ]],
        ]);

        $defaultItemsPagination = 9;

        $response->assertJsonCount($defaultItemsPagination, 'data');

    }

    public function test_can_list_office_locations_paginated()
    {
        $this->seed();

        $response = $this->getJson('/api/office_locations?page=2&per_page=20');

        $response->assertStatus(200);

        $response->assertJsonFragment(['current_page' => 2]);

        $response->assertJsonFragment(['per_page' => 20]);
    }
}
