<?php

namespace App\Policies\category;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Permission\Abilities\CategoryAbilities;

class CategoriePolicy
{
    use HandlesAuthorization;

    public function show(User $user, Categorie $categorie): bool
    {
        // منطق عرض الصنف (مثلاً للجميع)
        return true;
    }

    public function delete(User $user, Categorie $categorie): bool
    {
        return $this->hasAbility($user, CategoryAbilities::DELETE);
    }

    public function update(User $user, Categorie $categorie): bool
    {
        return $this->hasAbility($user, CategoryAbilities::UPDATE);
    }

    public function create(User $user): bool
    {
        return $this->hasAbility($user, CategoryAbilities::CREATE);
    }

    public function viewAny(User $user): bool
    {
        return $this->hasAbility($user, CategoryAbilities::VIEW);
    }

    private function hasAbility(User $user, string $ability): bool
    {
        // هذه الدالة تجلب صلاحيات المستخدم وتتحقق من وجود الصلاحية المطلوبة
        $abilities = CategoryAbilities::getAbilities($user);
        return in_array($ability, $abilities);
    }
}
