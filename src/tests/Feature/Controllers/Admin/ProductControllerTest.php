<?php

namespace Tests\Feature\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Admin;
use App\Models\User;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_create(): void
    {
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        // 認証していない場合
        $this->get(route('admin.products.index'))
            ->assertRedirect(route('admin.login'));

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('cart.index'))
            ->assertStatus(200);


        // 認証済みの場合
        // $admin = Admin::find($product1->admin_id);
        $admin = Admin::factory()->create();
        // dd($admin);

        $this->actingAs($admin)
            ->get(route('admin.products.index'))
            ->assertStatus(302);

        // $response
        //     ->assertStatus(200)
        //     ->assertSee($product1)
        //     ->assertSee($product2);
    }
}
