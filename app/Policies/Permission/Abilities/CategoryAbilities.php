<?php
namespace App\Policies\Permission\Abilities;

use App\Models\User;

final class CategoryAbilities
{
    public const DELETE = 'delete';
    public const UPDATE = 'update';
    public const CREATE = 'create';
    public const VIEW   = 'view';

    /**
     * إرجاع قائمة الصلاحيات المتاحة للمستخدم حسب نوعه
     */
    public static function getAbilities(User $user): array
    {
        $abilities = [];

        // صلاحيات المدير
       if (in_array($user->type, ['seller', 'admin'])) {
            $abilities = [
                self::DELETE,
                self::UPDATE,
                self::CREATE,
                self::VIEW,
            ];
        }



        // صلاحيات المستخدم العادي
        else {
            $abilities = [
                self::VIEW,
                self::CREATE,
                self::UPDATE,
                self::DELETE,

            ];
        }

        return $abilities;
    }
}
