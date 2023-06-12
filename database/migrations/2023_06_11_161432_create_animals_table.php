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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shelter_id');
            $table->string('name');
            $table->unsignedTinyInteger('age');
            $table->unsignedFloat('weight');
            $table->enum('type', ['cat']);
            $table->string('breed');
            $table->timestamps();

            $table->foreign('shelter_id')->references('id')->on('shelters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
