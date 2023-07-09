<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //________________ Here is Our Migration __________________
    public function up(): void  //for Create 
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("sName");
            $table->string("email")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //for drop
    {
        Schema::dropIfExists('students');
    }
};
