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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_type_id');
            $table->string('recipe_name', 255);
            $table->text('ingredients');
            $table->text('cooking_instructions');
            $table->string('prep_time', 50);
            $table->string('cooking_time', 50);
            $table->string('difficulty_level', 50);
            $table->string('cuisine_type', 50);
            $table->string('dietary_preferences', 50);
            $table->string('image', 255);

            $table->foreign('recipe_type_id')->references('id')->on('recipe_types')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
