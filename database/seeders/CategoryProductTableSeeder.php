<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => "Laptop",
            'description' => 'Danh Mục Laptop',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => "Màn Hình",
            'description' => 'Danh Mục Màn Hình',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => "Case PC",
            'description' => 'Danh Mục Case',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => "Bàn Phím",
            'description' => 'Danh Mục Bàn Phím',
        ]);
    }
}
