<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'きのこ',
                'sort_order' => '1'
            ],
            [
                'name' => '野菜',
                'sort_order' => '2'
            ],
            [
                'name' => '加工品',
                'sort_order' => '3'
            ],
            [
                'name' => '体験',
                'sort_order' => '4'
            ],
        ]);
    }
}
