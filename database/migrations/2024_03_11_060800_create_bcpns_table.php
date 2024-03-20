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
        Schema::create('bcpns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('date');
            $table->string('club_name');
            $table->date('dob');
            $table->string('contact');
            $table->string('photo')->nullable();
            $table->string('current_country')->nullable();
            $table->string('university')->nullable();
            $table->string('faculty')->nullable();
            $table->string('current_job')->nullable();
            $table->string('other_job')->nullable();
            $table->string('field_of_expertise')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('intro')->nullable();
            $table->string('status')->default('pending');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcpns');
    }
};
