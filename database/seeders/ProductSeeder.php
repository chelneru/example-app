<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Translation;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(10)
            ->has(Category::factory()->count(2),'categories')
            ->has(Translation::factory()->count(3))
            ->create();
    }
}
