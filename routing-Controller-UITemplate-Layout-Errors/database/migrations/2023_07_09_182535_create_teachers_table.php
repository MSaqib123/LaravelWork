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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("grade");
            //__ enum (static  Records  like  (Male ,Female) ___
            $table->enum('gender',['M','F']);
            $table->string("email")->unique();
            $table->string('img');
            $table->boolean('status');
            //_______ after Adding migration ____
            //if Again i will do  migration    will not work
            //__ 1. handling ___
            //for this we have to create   --> Column Add migration   or   

            //__ 2. handling ___
            //if  migrate  Reset / refersh  kr  lo  ---->  ager    Database ka  Structure bnaa rha ho too

            //$table->boolean('status1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
