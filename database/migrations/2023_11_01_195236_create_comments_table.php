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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->dateTime('created_time');
            $table->dateTime('edited_time');
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            // Deleting a user deletes all of their comments too
            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->onUpdate('cascade');

            // Deleting a post deletes all of its comments too
            $table->foreign('post_id')->references('id')->
            on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
