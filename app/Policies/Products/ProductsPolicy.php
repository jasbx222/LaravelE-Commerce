<?php

namespace App\Policies\Products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\CartItem;
use App\Policies\Permission\Abilities\ProductsAbilities;

class ProductsPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Product $product)
    {
        // منطق عرض المنتج (مثلاً للجميع)
        return true;
    }

    public function delete(User $user, Product $product)
    {
        if (! $this->hasAbility($user, ProductsAbilities::DELETE)) {
            return false;
        }
        
    }

    public function update(User $user,Product $product)
    {
        if (! $this->hasAbility($user, ProductsAbilities::UPDATE)) {
            return false;
        }
        else {
            return true;
        }
    }

    public function create(User $user)
    {
        return $this->hasAbility($user, ProductsAbilities::CREATE);
    }

    public function viewAny(User $user)
    {
        return $this->hasAbility($user, ProductsAbilities::VIEW);
    }

    private function hasAbility(User $user, string $ability): bool
    {
        //هاي الدالة حتى   تجيب الصلاحيات لليوزر وتجك اذا عنده او لا
        $abilities = ProductsAbilities::getAbilities($user);
        return in_array($ability, $abilities);
    }
}
