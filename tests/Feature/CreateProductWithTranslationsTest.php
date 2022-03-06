<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class CreateProductWithTranslationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $product = Product::factory()->make();
        $product->save();
        $response = $this->post('/products/'. $product->id.'/add-translation', ['name' => 'translated message','type'=>'main title','language'=>'da']);
        $response->assertStatus(200);
    }
    // add more different cases and test how the application should react to errors and invalid messages
}
