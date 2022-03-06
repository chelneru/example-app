<?php

namespace Tests\Unit\ProductService;

use App\Models\Category;
use App\Models\Product;
use App\Models\Translation;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class GetTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    protected ProductService $productService;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();
    }

    /** @test */
    public function test_fetch_products_by_category()
    {
        $category_name = 'test_category';
        $category = Category::factory()->make(['name' => $category_name]);
        Product::factory()
            ->count(3)
            ->hasAttached($category, function () use ($category) { // currently doesn't work " Integrity constraint violation: 1048 Column 'category_id' cannot be null (SQL: insert into `product_category` (`category_id`, `product_id`) values (?, 4))"
                return ['category_id' => $category->id];
            }, 'categories')
            ->create();
        $this->productService = resolve(ProductService::class);
        $result = $this->productService->getProductsByCategory($category_name);

        $this->assertEquals(3, count($result));

    }


}
