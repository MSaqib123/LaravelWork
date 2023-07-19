<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'=>'Mobile-1',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bW9iaWxlJTIwcGhvbmV8ZW58MHx8MHx8fDA%3D&w=1000&q=80',
                'description'=>'The Best mobile ever',
            ],
            [
                'name'=>'Mobile-2',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://kddi-h.assetsadobe3.com/is/image/content/dam/au-com/mobile/mb_img_58.jpg?scl=1',
                'description'=>'The Best mobile ever',
            ],
            [
                'name'=>'Mobile-3',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://m.media-amazon.com/images/I/4105IiC5tDL._AC_SR300,300.jpg',
                'description'=>'The Best mobile ever',
            ],
            [
                'name'=>'Mobile-4',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://cdn.abplive.com/onecms/images/product/c9f841992d21fb83f8e23746a87757eb.jpg?impolicy=abp_cdn&imwidth=300',
                'description'=>'The Best mobile ever',
            ],
            [
                'name'=>'Mobile-5',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://cdn1.smartprix.com/rx-ipN4tnrld-w1200-h1200/pN4tnrld.jpg',
                'description'=>'The Best mobile ever',
            ],
            [
                'name'=>'Mobile-6',
                'price'=>'10000',
                'category'=>'Mobile',
                'gallery'=>'https://i0.wp.com/aboutmobile.pk/wp-content/uploads/2023/01/samsung-Galaxy-A14-Green-co.jpg?fit=388%2C487&ssl=1',
                'description'=>'The Best mobile ever',
            ],
        ]);
    }
}
