<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    public const FIELD_NAME = 'name';
    public const FIELD_ADDRESS = 'address';
    public const FIELD_PHONE = 'phone';
    public const FIELD_AGE = 'age';
    public const FIELD_SALARY = 'salary';

    public const RELATION_SHELTER = 'shelter';

    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_ADDRESS,
        self::FIELD_PHONE,
        self::FIELD_AGE,
        self::FIELD_SALARY,
    ];

    protected $with = [
        self::RELATION_SHELTER,
    ];

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
