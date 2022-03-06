<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductTranslationRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Translation;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{  /**
 * The product service instance.
 *
 * @var \App\Services\ProductService
 */
    protected ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // here we can make use a view page to show form for product
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(StoreProductRequest $request)
    {
        $result = $this->productService->createProduct($request->post('name'));
        return  $result->toJson();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function add_translation(AddProductTranslationRequest $request, Product $product)
    {
        $translation = new Translation($request->all());
        $translation->fill($request->all());

        $result = null;
        // TODO add more validation
          $result =  $product->translations()->save($translation);
          return $result->toJson() ?? null;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
