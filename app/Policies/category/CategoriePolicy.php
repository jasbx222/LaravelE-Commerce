<?php

namespace App\Policies\Products;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Permission\Abilities\CategoryAbilities;

class CategoriePolicy
{
    use HandlesAuthorization;

    public function show(User $user, Categorie $categorie)
    {
        // منطق عرض المنتج (مثلاً للجميع)
        return true;
    }

    public function delete(User $user,Categorie $categorie)
    {
        if (! $this->hasAbility($user, CategoryAbilities::DELETE)) {
            return false;
        }
        
    }

    public function update(User $user,Categorie $product)
    {
        if (! $this->hasAbility($user, CategoryAbilities::UPDATE)) {
            return false;
        }
       
    }

    public function create(User $user)
    {
        return $this->hasAbility($user, CategoryAbilities::CREATE);
    }

    public function viewAny(User $user)
    {
        return $this->hasAbility($user, CategoryAbilities::VIEW);
    }

    private function hasAbility(User $user, string $ability): bool
    {
        //هاي الدالة حتى   تجيب الصلاحيات لليوزر وتجك اذا عنده او لا
        $abilities = CategoryAbilities::getAbilities($user);
        return in_array($ability, $abilities);
    }
}
