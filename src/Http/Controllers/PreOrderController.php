<?php

namespace YourVendor\PreOrderAddon\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PreOrderController
{
    public function create(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0'
        ]);

        // Create pre-order logic
        $preOrder = \YourVendor\PreOrderAddon\Models\PreOrder::create($validated);

        return response()->json(['data' => $preOrder], 201);
    }

    public function convert(string $id): JsonResponse
    {
        $preOrder = \YourVendor\PreOrderAddon\Models\PreOrder::findOrFail($id);
        $order = $preOrder->convertToOrder();

        return response()->json(['data' => $order]);
    }
}
