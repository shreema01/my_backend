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
        
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('story');
            $table->json('writing_philosophy');
            $table->json('award_and_recognition');
            $table->json('social_links');
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        
        Schema::dropIfExists('authors');
        
    }
};
