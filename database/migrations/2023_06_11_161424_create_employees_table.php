<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shelter_id'); // If we wanted to allow one employee to be assigned to multiple shelters this should be in a pivot table
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->unsignedTinyInteger('age');
            $table->unsignedSmallInteger('salary');
            $table->timestamps();

            $table->foreign('shelter_id')->references('id')->on('shelters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
