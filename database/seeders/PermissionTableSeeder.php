<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'business-list',
            'business-create',
            'business-edit',
            'business-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'purchase-list',
            'purchase-create',
            'purchase-edit',
            'purchase-delete',
            'dashboard-bu',
            'dashboard-product',
            'dashboard-sales',
            'dashboard-po'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
