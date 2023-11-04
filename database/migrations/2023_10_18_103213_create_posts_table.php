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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');                       // Primary Key
            $table->string('body');
            $table->string('title');
            $table->string('image_path')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            // Deleting a user deletes all of their posts too
            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
