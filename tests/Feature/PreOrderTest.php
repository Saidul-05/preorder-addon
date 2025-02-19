<?php

namespace YourVendor\PreOrderAddon\Tests\Feature;

use Tests\TestCase;
use YourVendor\PreOrderAddon\Models\PreOrder;

class PreOrderTest extends TestCase
{
    public function test_create_pre_order()
    {
        $response = $this->postJson('/api/preorder/create', [
            'product_id' => 1,
            'customer_id' => 1,
            'amount' => 100
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => [
                'product_id', 'customer_id', 'amount'
            ]]);
    }
}
