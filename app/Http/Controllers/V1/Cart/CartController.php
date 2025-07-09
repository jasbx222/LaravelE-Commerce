<?php

namespace App\Http\Controllers\V1\Cart;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Admin\StoreCartRequest;
use App\Http\Requests\Admin\UpdateCartRequest;
use App\Http\Service\V1\Cart\CartService;
use App\Models\Cart;

class CartController extends ApiController
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return $this->cartService->index();
    }

    public function store(StoreCartRequest $request)
    {
        return $this->cartService->store($request);
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $this->isAble('update', $cart);
        return $this->cartService->update($request, $cart);
    }

    public function destroy(Cart $cart)
    {
        $this->isAble('delete', $cart);
        return $this->cartService->destroy($cart);
    }

    public function show(Cart $cart)
    {
        $this->isAble('show', $cart);
        return $this->cartService->show($cart);
    }
}
