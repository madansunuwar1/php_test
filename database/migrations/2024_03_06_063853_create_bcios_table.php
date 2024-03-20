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
        Schema::create('bcios', function (Blueprint $table) {
            $table->id();
            $table->string('club_name');
            $table->string('name');
            $table->string('country');
            $table->string('position');
            $table->string('date');
            $table->string('personal_email');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('status')->default('pending');
            $table->string('activities')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('president')->nullable();
            $table->string('based_on')->nullable();
            $table->string('established_on')->nullable();
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
        Schema::dropIfExists('bcios');
    }
};
