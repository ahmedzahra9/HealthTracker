<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('location_ar')->nullable();
            $table->string('location_en')->nullable();
            $table->string('description')->nullable();
            $table->double('latitude')->default(0.0);
            $table->double('longitude')->default(0.0);
            $table->integer('rating')->default(0);
            $table->integer('day_limit')->default(1);
            $table->integer('age_from')->default(1);
            $table->integer('age_to')->default(100);
            $table->double('price')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
