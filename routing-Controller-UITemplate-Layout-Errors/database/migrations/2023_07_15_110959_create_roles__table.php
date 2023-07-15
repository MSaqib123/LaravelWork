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
        Schema::create('roles_', function (Blueprint $table) {
            $table->id();
            $table->string("Role")->unique();

            //i forgot to add  forign key  or any column  here
            //________
            //$table->unsignedBigInteger("createdBy"); //integer key
            //________
            //to hum yahn par column   nhin add krain gaa  blakaa 
            //Updated migration bnayin ga or wahan par add kraing ga

            //php artisan make:migration add_createdby_column_to_roles__table

            $table->boolean("status");
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_');
    }
};
