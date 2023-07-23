<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeleveryType_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delevery_type')->insert([
            ['delivery_type_name' => 'Standard Delivery'],
            ['delivery_type_name' => 'Express Delivery'],
            ['delivery_type_name' => 'Next-Day Delivery'],
        ]);
    }
}
