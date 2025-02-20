<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annonce', function (Blueprint $table) {
            $table->id('id_annonce');
            $table->string('title');
            $table->text('description');
            $table->string('location'); 
            $table->enum('type', ['lost', 'found']);
            $table->enum('status', ['active', 'resolved', 'closed'])->default('active');
            $table->string('category');  
            $table->string('image'); 
            $table->date('date_of_event');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonce');
    }
};
