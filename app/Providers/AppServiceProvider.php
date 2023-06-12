<?php

namespace App\Providers;

use App\Interfaces\Repositories\AnimalList;
use App\Interfaces\Repositories\AssignShelter;
use App\Interfaces\Repositories\CreateShelter;
use App\Interfaces\Repositories\DeleteAnimal;
use App\Interfaces\Repositories\DeleteEmployee;
use App\Interfaces\Repositories\DeleteShelter;
use App\Interfaces\Repositories\EmployeesList;
use App\Interfaces\Repositories\GetAnimal;
use App\Interfaces\Repositories\GetEmployee;
use App\Interfaces\Repositories\GetShelter;
use App\Interfaces\Repositories\NewAnimal;
use App\Interfaces\Repositories\NewEmployee;
use App\Interfaces\Repositories\ShelterAnimalsList;
use App\Interfaces\Repositories\ShelterEmployeesList;
use App\Interfaces\Repositories\ShelterList;
use App\Interfaces\Repositories\UpdateAnimal;
use App\Interfaces\Repositories\UpdateEmployee;
use App\Interfaces\Repositories\UpdateShelter;
use App\Interfaces\Services\CreateAnimal;
use App\Interfaces\Services\CreateEmployee;
use App\Repositories\AnimalRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\ShelterRepository;
use App\Services\AddAnimalToShelter;
use App\Services\AddEmployeeToShelter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ShelterList::class => ShelterRepository::class,
        GetShelter::class => ShelterRepository::class,
        CreateShelter::class => ShelterRepository::class,
        DeleteShelter::class => ShelterRepository::class,
        UpdateShelter::class => ShelterRepository::class,
        AssignShelter::class => ShelterRepository::class,
        AnimalList::class => AnimalRepository::class,
        ShelterAnimalsList::class => AnimalRepository::class,
        GetAnimal::class => AnimalRepository::class,
        NewAnimal::class => AnimalRepository::class,
        DeleteAnimal::class => AnimalRepository::class,
        UpdateAnimal::class => AnimalRepository::class,
        CreateAnimal::class => AddAnimalToShelter::class,
        EmployeesList::class => EmployeeRepository::class,
        ShelterEmployeesList::class => EmployeeRepository::class,
        GetEmployee::class => EmployeeRepository::class,
        CreateEmployee::class => AddEmployeeToShelter::class,
        NewEmployee::class => EmployeeRepository::class,
        DeleteEmployee::class => EmployeeRepository::class,
        UpdateEmployee::class => EmployeeRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
