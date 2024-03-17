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
            $table->string('email');
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
