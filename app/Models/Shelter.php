<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shelter extends Model
{
    use HasFactory;

    public const FIELD_NAME = 'name';
    public const FIELD_ADDRESS = 'address';
    public const FIELD_PHONE = 'phone';

    public const RELATION_ANIMALS = 'animals';
    public const RELATION_EMPLOYEES = 'employees';

    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_ADDRESS,
        self::FIELD_PHONE,
    ];

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
