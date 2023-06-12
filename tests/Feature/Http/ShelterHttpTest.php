<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Assemblers\ShelterAssembler;
use Tests\TestCase;

class ShelterHttpTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_shelters(): void
    {
        $count = 20;
        ShelterAssembler::assembleList($count);

        $response = $this->get('api/shelters');

        $response->assertOk();
        $response->assertJsonCount($count);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'address',
                'phone',
            ],
        ]);
    }

    public function test_it_shows_shelter(): void
    {
        $shelterId = 1;
        $shelter = ShelterAssembler::assemble([
            'id' => $shelterId,
        ]);

        $response = $this->get("api/shelters/$shelterId");

        $response->assertOk();
        $response->assertExactJson([
            'id' => $shelterId,
            'name' => $shelter->name,
            'address' => $shelter->address,
            'phone' => $shelter->phone,
            'animals' => [],
            'employees' => [],
        ]);
    }

    public function test_it_creates_shelter(): void
    {
        $data = [
            'name' => 'Test Shelter',
            'address' => 'Test Address',
            'phone' => 'Test Phone',
        ];

        $response = $this->post('api/shelters', $data);

        $response->assertCreated();
        $this->assertDatabaseHas('shelters', $data);
    }

    public function test_it_deletes_shelter(): void
    {
        $shelterId = 1;
        $shelter = ShelterAssembler::assemble([
            'id' => $shelterId,
        ]);

        $response = $this->delete("api/shelters/$shelterId");

        $response->assertNoContent();
        $this->assertDatabaseMissing('shelters', [
            'id' => $shelter->id,
        ]);
    }

    public function test_it_updates_shelter(): void
    {
        $shelterId = 1;
        $originalData = [
            'id' => $shelterId,
            'name' => 'Test Shelter',
            'address' => 'Test Address',
            'phone' => 'Test Phone',
        ];
        ShelterAssembler::assemble($originalData);
        $dataToUpdate = [
            'name' => 'Updated Shelter',
            'address' => 'Updated Address',
            'phone' => 'Updated Phone',
        ];

        $response = $this->put("api/shelters/$shelterId", $dataToUpdate);

        $response->assertNoContent();
        $this->assertDatabaseHas('shelters', $dataToUpdate);
        $this->assertDatabaseMissing('shelters', $originalData);
    }
}
