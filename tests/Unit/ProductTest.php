<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
// use App\User;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_product()
    {
        $formData = [
            'name' => 'Product', 
            'quantity' => 100, 
            'price' => 99.75, 
            'category' => 'Category1',
        ];

        $this->json('POST', route('products.store'), $formData)
            ->assertStatus(201)
            ->assertJson(['data' => $formData]);
    }

    // public function test_can_show_product()
    // {
    //     $product = Product::factory()->make();

    //     $this->json('GET', route('products.show', $product->id))->assertStatus(200);
    // }

    // public function test_can_update_product() {

    //     $product = Product::factory()->create();

    //     $updatedData = [
    //         'name' => 'new Product', 
    //         'quantity' => 200, 
    //         'price' => 100.75, 
    //         'category' => 'Category2', 
    //     ];

    //     $this->json('PUT', route('products.update', $product->id), $updatedData)
    //         ->assertStatus(200)
    //         ->assertJson(['data' => $updatedData]);
    // }
}
