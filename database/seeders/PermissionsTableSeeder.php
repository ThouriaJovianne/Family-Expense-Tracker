<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'expence_create',
            ],
            [
                'id'    => 23,
                'title' => 'expence_edit',
            ],
            [
                'id'    => 24,
                'title' => 'expence_show',
            ],
            [
                'id'    => 25,
                'title' => 'expence_delete',
            ],
            [
                'id'    => 26,
                'title' => 'expence_access',
            ],
            [
                'id'    => 27,
                'title' => 'revenue_create',
            ],
            [
                'id'    => 28,
                'title' => 'revenue_edit',
            ],
            [
                'id'    => 29,
                'title' => 'revenue_show',
            ],
            [
                'id'    => 30,
                'title' => 'revenue_delete',
            ],
            [
                'id'    => 31,
                'title' => 'revenue_access',
            ],
            [
                'id'    => 32,
                'title' => 'transfer_create',
            ],
            [
                'id'    => 33,
                'title' => 'transfer_edit',
            ],
            [
                'id'    => 34,
                'title' => 'transfer_show',
            ],
            [
                'id'    => 35,
                'title' => 'transfer_delete',
            ],
            [
                'id'    => 36,
                'title' => 'transfer_access',
            ],
            [
                'id'    => 37,
                'title' => 'balance_create',
            ],
            [
                'id'    => 38,
                'title' => 'balance_edit',
            ],
            [
                'id'    => 39,
                'title' => 'balance_show',
            ],
            [
                'id'    => 40,
                'title' => 'balance_delete',
            ],
            [
                'id'    => 41,
                'title' => 'balance_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}