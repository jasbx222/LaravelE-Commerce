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
    // صلاحيات الأدمن كل شيء
    if ($user->type === 'admin') {
        return [
            self::DELETE,
            self::UPDATE,
            self::CREATE,
            self::VIEW,
        ];
    }

    // صلاحيات البائع عرض وتعديل فقط 
    if ($user->type === 'seller') {
        return [
            self::VIEW,
            self::UPDATE,
        ];
    }

    // صلاحيات العميل عرض 
    return [
        self::VIEW,
    ];
}
}