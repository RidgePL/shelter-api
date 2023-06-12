<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    public const FIELD_NAME = 'name';
    public const FIELD_TYPE = 'type';
    public const FIELD_BREED = 'breed';
    public const FIELD_AGE = 'age';
    public const FIELD_WEIGHT = 'weight';

    public const RELATION_SHELTER = 'shelter';

    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_TYPE,
        self::FIELD_BREED,
        self::FIELD_AGE,
        self::FIELD_WEIGHT,
    ];

    protected $with = [
        self::RELATION_SHELTER,
    ];

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
