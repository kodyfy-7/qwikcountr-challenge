<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();
        $categories = [
            [
              "name" => "Category 1"
            ],
            [
               "name" => "Category 2"
            ],
            [
               "name" => "Category 3"
            ],
            [
               "name" => "Category 4"
            ],
            [
               "name" => "Category 5"
            ]
        ];

        collect($categories)->each(function ($category)  {
            Category::create($category);
        });
    }
}