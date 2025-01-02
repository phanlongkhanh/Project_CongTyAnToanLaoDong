<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producttypes')->insert([
            'id' => 1,
            'name' => "HP",
            'description' => 'Loại HP',
        ]);
        DB::table('producttypes')->insert([
            'id' => 2,
            'name' => "Lenovo",
            'description' => 'Loại Lenovo',
        ]);
        DB::table('producttypes')->insert([
            'id' => 3,
            'name' => "Dell",
            'description' => 'Loại Dell',
        ]);
        DB::table('producttypes')->insert([
            'id' => 4,
            'name' => "MacBook",
            'description' => 'Loại MacBook',
        ]);
        DB::table('producttypes')->insert([
            'id' => 5,
            'name' => "Acer",
            'description' => 'Loại Acer',
        ]);
        DB::table('producttypes')->insert([
            'id' => 6,
            'name' => "ThinkPad",
            'description' => 'Loại ThinkPad',
        ]);
        DB::table('producttypes')->insert([
            'id' => 7,
            'name' => "Asus",
            'description' => 'Loại Asus',
        ]);
        DB::table('producttypes')->insert([
            'id' => 8,
            'name' => "Microsoft",
            'description' => 'Loại Microsoft',
        ]);
    }
}
