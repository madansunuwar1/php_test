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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id');
            $table->bigInteger('content_templates_id')->default(1);
            $table->string('section_title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('section_slug')->nullable();
            $table->longText('section_description')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->tinyInteger('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
