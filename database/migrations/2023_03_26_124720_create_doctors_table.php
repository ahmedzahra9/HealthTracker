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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type',['clinic','hospital','both'])->default('hospital');
            $table->enum('gender',['male','female'])->default('male');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
