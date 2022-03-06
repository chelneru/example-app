<?php

namespace Tests\Unit\ProductService;

use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CreateTest extends TestCase
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
    public function test_create_valid_product()
    {
        $this->productService = resolve(ProductService::class);
        $name = $this->faker->name();
        $product = $this->productService->createProduct($name);
        $product->save();
        $this->assertDatabaseHas('products', [
            'name' => $name,
        ]);
    }

    public function test_duplicate_name_product()
    {
        $this->productService = resolve(ProductService::class);
        $name = $this->faker->name();
        $product = $this->productService->createProduct($name);
        $product->save();
        $product2 = $this->productService->createProduct($name);
        try {
            $product2->saveOrFail();
        } catch (\Throwable $t) {
        }

        $this->assertDatabaseCount('products', 1);
    }
}
