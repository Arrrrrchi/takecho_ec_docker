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
                'admin_id' => 1,
                'name' => '商品1',
                'information' => '商品1の情報です',
                'price' => '500',
                'is_selling' => 1,
                'category_id' => 1,
                'image1' => 1,
                'image2' => 2,
                'image3' => 3,
                'image4' => 4,
            ],
            [
                'admin_id' => 1,
                'name' => '商品2',
                'information' => '商品2の情報です',
                'price' => '600',
                'is_selling' => 1,
                'category_id' => 2,
                'image1' => 2,
                'image2' => 3,
                'image3' => 4,
                'image4' => 5,
            ],
            [
                'admin_id' => 1,
                'name' => '商品3',
                'information' => '商品3の情報です',
                'price' => '400',
                'is_selling' => 1,
                'category_id' => 3,
                'image1' => 3,
                'image2' => 4,
                'image3' => 5,
                'image4' => 1,
            ],
            [
                'admin_id' => 1,
                'name' => '商品4',
                'information' => '商品4の情報です',
                'price' => '800',
                'is_selling' => 1,
                'category_id' => 4,
                'image1' => 4,
                'image2' => 1,
                'image3' => null,
                'image4' => null,
            ],
            [
                'admin_id' => 1,
                'name' => '商品5',
                'information' => '商品5の情報です',
                'price' => '700',
                'is_selling' => 0,
                'category_id' => 1,
                'image1' => 1,
                'image2' => 2,
                'image3' => 3,
                'image4' => 4,
            ],
        ]);
    }
}
