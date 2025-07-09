<?php

namespace App\Policies\Cart;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Cart $cart)
    {
        
        return $user->id === $cart->user_id;
    }

    public function delete(User $user, Cart $cart)
    {
        return $user->id === $cart->user_id;
    }

    public function update(User $user, Cart $cart)
    {
        return $user->id === $cart->user_id;
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
