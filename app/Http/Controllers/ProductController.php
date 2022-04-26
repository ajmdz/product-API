<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function indexCategory($category)
    {
        return ProductResource::collection(Product::where('category', $category)
                                                ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $faker = \Faker\Factory::create(1);

        $product = Product::create([
        // test
            // 'name' => $faker->word,  
            // 'quantity' => $faker->numberBetween(0, 100),  
            // 'price' => $faker->randomFloat(1, 20, 30),  
            // 'category' => $this->category,
            'name' => $request->name,  
            'quantity' => $request->quantity,  
            'price' => $request->price,  
            'category' => $request->category,
        ]);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // METHOD 1
        // $product->update([
        //     'name' => $request->input('name'),
        //     'quantity' => $request->input('quantity'),  
        //     'price' => $request->input('price'),  
        //     'category' => $request->input('category'), 
        // ]);

        // METHOD 2
        $product->update($request->only(['name', 'quantity', 'price', 'category']));

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // return response()->json(null, 204);
        return response(null, 204);
    }
}
