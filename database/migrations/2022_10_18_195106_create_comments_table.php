<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create the comments table
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table -> text('body');
            // foreign key to users table
            $table -> foreignId('user_id') -> references('id') -> on('users')->onDelete('cascade')->onUpdate('cascade');     
            // foreign key to posts table
            $table -> foreignId('posts_id') -> references('id') -> on('posts')->onDelete('cascade')->onUpdate('cascade');     
            // foreign key to comment parent
            $table -> foreignId('parent_id')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
