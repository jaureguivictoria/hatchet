<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use League\Csv\Writer;
use Tests\TestCase;

class UploadOfficeLocationsCSVTest extends TestCase
{
    public function test_upload_office_locations_requires_a_file(): void
    {
        $response = $this->postJson('/api/office_locations/upload');

        $response->assertStatus(422);

        $response->assertJsonValidationErrorFor('file');

        $response->assertJsonValidationErrors(['file' => 'required']);
    }

    public function test_upload_office_locations_requires_a_csv_type_of_file(): void
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->postJson('/api/office_locations/upload', ['file' => $file]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrorFor('file');

        $response->assertJsonValidationErrors(['file' => 'type']);
    }

    public function test_upload_office_locations_validates_file_size(): void
    {
        $file = UploadedFile::fake()->create('items.csv', 10001, 'text/csv');

        $response = $this->postJson('/api/office_locations/upload', ['file' => $file]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrorFor('file');
    }

    public function test_cannot_upload_empty_office_locations(): void
    {
        $file = UploadedFile::fake()->create('items.csv', 100, 'text/csv');

        $response = $this->postJson('/api/office_locations/upload', ['file' => $file]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrorFor('file');
    }

    public function test_can_upload_office_locations(): void
    {
        $officeLocationsColumns = ['name', 'price', 'offices', 'tables', 'sqmt'];

        $officeLocation1 = ['Labouchere Rd', 3000, 50, 30, 3400.5];
        $officeLocation2 = ['CBD', 7000, 40, 60, 7445.33];;

        $records = array_merge([$officeLocation1, $officeLocation2]);

        $csv = Writer::createFromString();

        $csv->insertOne($officeLocationsColumns);

        $csv->insertAll($records);

        $file = UploadedFile::fake()->createWithContent('items.csv', $csv->toString());

        $response = $this->postJson('/api/office_locations/upload', ['file' => $file]);

        $response->assertOk();

        $this->assertDatabaseCount('office_locations', 2);

        $this->assertDatabaseHas('office_locations', array_combine($officeLocationsColumns, $officeLocation1));

        $this->assertDatabaseHas('office_locations', array_combine($officeLocationsColumns, $officeLocation2));
    }
}
