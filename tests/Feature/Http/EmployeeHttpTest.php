<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Assemblers\EmployeeAssembler;
use Tests\Assemblers\ShelterAssembler;
use Tests\TestCase;

class EmployeeHttpTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_employees(): void
    {
        $count = 20;
        EmployeeAssembler::assembleList($count);

        $response = $this->get('api/employees');

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
                'phone_number'
            ],
        ]);
    }

    public function test_it_lists_employees_for_shelter(): void
    {
        $count = 20;
        $shelter = ShelterAssembler::assembleWithEmployeeList($count);

        $response = $this->get("api/shelters/$shelter->id/employees");

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
                'phone_number'
            ],
        ]);
    }

    public function test_it_shows_employee(): void
    {
        $employee = EmployeeAssembler::assemble();

        $response = $this->get("api/employees/$employee->id");

        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'shelter' => [
                'id',
                'name',
            ],
            'name',
            'phone_number',
            'age',
            'salary',
            'address'
        ]);
    }

    public function test_it_creates_employee(): void
    {
        $shelter = ShelterAssembler::assemble();
        $data = [
            'name' => 'John Doe',
            'phone' => '123456789',
            'age' => 20,
            'salary' => 1000,
            'address' => 'Some address',
            'shelter_id' => $shelter->id,
        ];

        $response = $this->post('api/employees', $data);

        $response->assertCreated();
        $response->assertJsonStructure([
            'id',
            'shelter' => [
                'id',
                'name',
            ],
            'name',
            'phone_number',
            'age',
            'salary',
            'address'
        ]);
        $this->assertDatabaseHas('employees', $data);
    }

    public function test_it_deletes_employee(): void
    {
        $employee = EmployeeAssembler::assemble();

        $response = $this->delete("api/employees/$employee->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing('employees', [
            'id' => $employee->id,
        ]);
    }

    public function test_it_updates_employee(): void
    {
        $originalData = [
            'name' => 'John Doe',
            'phone' => '123456789',
            'age' => 20,
            'salary' => 1000,
            'address' => 'Some address',
        ];
        $employee = EmployeeAssembler::assemble();
        $data = [
            'name' => 'Test John Doe',
            'phone' => '987654321',
            'age' => 25,
            'salary' => 5000,
            'address' => 'Test Some address',
        ];

        $response = $this->put("api/employees/$employee->id", $data);

        $response->assertNoContent();
        $this->assertDatabaseHas('employees', $data);
        $this->assertDatabaseMissing('employees', $originalData);
    }
}
