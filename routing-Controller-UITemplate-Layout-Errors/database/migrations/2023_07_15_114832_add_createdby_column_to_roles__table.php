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
        Schema::table('roles_', function (Blueprint $table) {
            //___ 1. added at the end of table ___________
            //$table->unsignedBigInteger("createdBy");

            //___ 2. added after Column ___________
            //$table->unsignedBigInteger("createdBy")->after('Role');

            //___ 3. added befor Column ___________
            $table->unsignedBigInteger("createdBy")->after('status');

            //run php artisan migrate
           
            
            //You can add forign key here
            //$table->foreign('createdBy')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles_', function (Blueprint $table) {
            //
        });
    }
};
