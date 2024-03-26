<?php

use App\Models\Page;
use App\Models\Role;
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('page_image')->nullable();
            $table->bigInteger('parent_id')->default(0);
            $table->bigInteger('user_id');
            $table->enum('status', ['publish', 'draft', 'pending'])->default('publish');
            $table->timestamps();
            $table->softDeletes();
        });
        Page::insert([
            ['title'=>'Home', 'slug'=>'home', 'user_id'=>2],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
