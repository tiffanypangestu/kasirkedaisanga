<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Makanan',
                'description' => 'Kategori Makanan',
            ],
            [
                'category_name' => 'Minuman',
                'description' => 'Kategori Minuman',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
