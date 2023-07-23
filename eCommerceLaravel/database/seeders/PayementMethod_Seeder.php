<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayementMethod_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_method')->insert([
            ['payment_method_name' => 'Credit Card'],
            ['payment_method_name' => 'PayPal'],
            ['payment_method_name' => 'Bank Transfer'],
            ['Payment_method_name' => 'Jazz Cash'],
            ['Payment_method_name' => 'Esypasaa'],
            ['Payment_method_name' => 'Cash on Delevery']
        ]);
    }
}
