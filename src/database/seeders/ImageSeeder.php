<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'filename' => 'nameko1.jpg',
                'admin_id' => 1,
                'title' => null,
            ],
            [
                'filename' => 'nameko2.jpg',
                'admin_id' => 1,
                'title' => null,
            ],
            [
                'filename' => 'nameko3.jpg',
                'admin_id' => 1,
                'title' => null,
            ],
            [
                'filename' => 'nameko4.jpeg',
                'admin_id' => 1,
                'title' => null,
            ],
            [
                'filename' => 'nameko5.jpg',
                'admin_id' => 1,
                'title' => null,
            ],
        ]);
    }
}
