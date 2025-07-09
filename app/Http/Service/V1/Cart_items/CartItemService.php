<?php

namespace App\Http\Service\Client\CartItems;

use App\Http\Requests\Admin\Cart_ItemRequest;
use App\Models\CartItem;

class CartItemService
{
    public function index()
    {
        return CartItem::all();
    }

    public function store(Cart_ItemRequest $request)
    {
        $data = $request->validated();
        $cartItem = CartItem::create($data);

        return response()->json([
            'message' => 'تمت إضافة العنصر إلى السلة بنجاح.',
            'data' => $cartItem
        ], 201);
    }

    public function show(CartItem $cartItem)
    {
        return $cartItem;
    }

    public function update(Cart_ItemRequest $request, CartItem $cartItem)
    {
        $data = $request->validated();
        $cartItem->update($data);

        return response()->json([
            'message' => 'تم تحديث عنصر السلة بنجاح.',
            'data' => $cartItem
        ]);
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return response()->json([
            'message' => 'تم حذف العنصر من السلة بنجاح.'
        ]);
    }
}
