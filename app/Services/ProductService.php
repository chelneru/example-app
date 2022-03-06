<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Translation;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class ProductService
{

    public function createProduct($name): Product {
        return Product::factory()->make([
            'name' =>$name,
        ]);
    }

    public function getProductsByCategory($category_name) : Collection
    {
        return Product::whereHas('categories', function (Builder $query) use ($category_name) {
            $query->where('name', '=', $category_name);
        })->get();
    }

    public function AddTranslationToProduct() : Collection
    {
        return Product::whereHas('categories', function (Builder $query) use ($category_name) {
            $query->where('name', '=', $category_name);
        })->get();
    }
}
