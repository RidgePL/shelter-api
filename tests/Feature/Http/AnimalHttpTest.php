<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Assemblers\AnimalAssembler;
use Tests\Assemblers\ShelterAssembler;
use Tests\TestCase;

class AnimalHttpTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_animals(): void
    {
        $count = 20;
        AnimalAssembler::assembleList($count);

        $response = $this->get('api/animals');

        $response->assertOk();
        $response->assertJsonCount($count);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'shelter' => [
                    'id',
                    'name',
                ],
                'name',
                'type',
                'breed',
            ],
        ]);
    }

    public function test_it_lists_animals_for_shelter(): void
    {
        $count = 20;
        $shelter = ShelterAssembler::assembleWithAnimalList($count);

        $response = $this->get("api/shelters/$shelter->id/animals");

        $response->assertOk();
        $response->assertJsonCount($count);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'shelter' => [
                    'id',
                    'name',
                ],
                'name',
                'type',
                'breed',
            ],
        ]);
    }

    public function test_it_shows_animal(): void
    {
        $animalId = 99;
        AnimalAssembler::assemble([
            'id' => $animalId,
        ]);

        $response = $this->get("api/animals/$animalId");

        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'shelter' => [
                'id',
                'name',
            ],
            'name',
            'type',
            'breed',
            'weight',
            'age',
        ]);
    }

    public function test_it_creates_animal(): void
    {
        $shelter = ShelterAssembler::assemble();
        $data = [
            'name' => 'Test Animal',
            'type' => 'cat',
            'breed' => 'Test Breed',
            'age' => 5,
            'weight' => 10.5,
            'shelter_id' => $shelter->id,
        ];

        $response = $this->post('api/animals', $data);

        $response->assertCreated();
        $response->assertJsonStructure([
            'id',
            'shelter' => [
                'id',
                'name',
            ],
            'age',
            'name',
            'type',
            'breed',
            'weight',
        ]);
        $this->assertDatabaseHas('animals', $data);
    }

    public function test_it_deletes_animal(): void
    {
        $animal = AnimalAssembler::assemble();

        $response = $this->delete("api/animals/$animal->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing('animals', [
            'id' => $animal->id,
        ]);
    }

    public function test_it_updates_animal(): void
    {
        $animalId = 99;

        $originalData = [
            'id' => $animalId,
            'name' => 'Test Animal Original',
            'type' => 'cat',
            'breed' => 'Test Breed Original',
            'age' => 15,
            'weight' => 20.5,
        ];
        AnimalAssembler::assemble($originalData);
        $data = [
            'name' => 'Test Animal',
            'type' => 'cat',
            'breed' => 'Test Breed',
            'age' => 5,
            'weight' => 10.5,
        ];

        $response = $this->put("api/animals/$animalId", $data);

        $response->assertNoContent();
        $this->assertDatabaseHas('animals', $data);
        $this->assertDatabaseMissing('animals', $originalData);
    }
}
