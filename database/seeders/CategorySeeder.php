<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Electronics',
            ],
            [
                'name' => 'Books',
            ],
            [
                'name' => 'Bicycles',
            ],
            [
                'name' => 'Gardening tools',
            ],
            [
                'name' => 'Kitchen tools',
            ],
            [
                'name' => 'Mobile phones',
            ],
            [
                'name' => 'Televisions',
            ]
        ]);
    }
}
