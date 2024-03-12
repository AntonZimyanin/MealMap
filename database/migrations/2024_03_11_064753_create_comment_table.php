<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commentator_id');
            $table->unsignedBigInteger('cook_id');
            $table->string('food_title');
            $table->text('comment');
            $table->unsignedInteger('rating');
            $table->timestamps();
    
            $table->foreign('commentator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cook_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comment', function (Blueprint $table) {
            Schema::dropIfExists('comments');
        });
    }
};
