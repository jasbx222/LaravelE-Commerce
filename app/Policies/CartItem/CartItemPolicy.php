<?php

namespace App\Policies\Cart;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\CartItem;
class CartItemPolicy
{
    use HandlesAuthorization;

    public function show(User $user, CartItem $cart_item)
    {
        return $user->id === $cart_item->user_id;
    }

    public function delete(User $user, CartItem $cart_item)
    {
        return $user->id === $cart_item->user_id;
    }

    public function update(User $user, CartItem $cart_item)
    {
        return $user->id === $cart_item->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function viewAny(User $user)
    {
        return true;
    }
}
