<?php

namespace App\Http\Controllers\V1\CartItems;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Admin\Cart_ItemRequest;
use App\Http\Service\Client\CartItems\CartItemService;
use App\Models\CartItem;

class CartItemController extends ApiController
{
    private $cartService;

    public function __construct(CartItemService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        
        return $this->cartService->index();
    }

    public function store(Cart_ItemRequest $request)
    {
            
        return $this->cartService->store($request);
    }

    public function show(CartItem $cartItem)
    {
          $this->isAble('show', $cartItem);
        return $this->cartService->show($cartItem);
    }

    public function update(Cart_ItemRequest $request, CartItem $cartItem)
    {
          $this->isAble('update', $cartItem);
        return $this->cartService->update($request, $cartItem);
    }

    public function destroy(CartItem $cartItem)
    {
        return $this->cartService->destroy($cartItem);
    }
}
