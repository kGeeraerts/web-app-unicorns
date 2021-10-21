<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view-unavailable-dogs']);
        Permission::create(['name' => 'add-dog']);
        Permission::create(['name' => 'edit-any-dog']);
        Permission::create(['name' => 'remove-any-dog']);
        Permission::create(['name' => 'view-unavailable-products']);
        Permission::create(['name' => 'add-product']);
        Permission::create(['name' => 'edit-any-product']);
        Permission::create(['name' => 'remove-any-product']);
        Permission::create(['name' => 'answer-messages']);
        Permission::create(['name' => 'view-all-carts']);
        Permission::create(['name' => 'edit-all-carts']);
        Permission::create(['name' => 'view-members']);
        Permission::create(['name' => 'under-construction']);

        // Create roles and assign existing permissions
        Role::create(['name' => 'customer']);

        $vendor = Role::create(['name' => 'vendor']);
        $vendor->givePermissionTo('answer-messages');
        $vendor->givePermissionTo('view-unavailable-dogs');
        $vendor->givePermissionTo('add-dog');
        $vendor->givePermissionTo('edit-any-dog');
        $vendor->givePermissionTo('remove-any-dog');
        $vendor->givePermissionTo('view-unavailable-products');
        $vendor->givePermissionTo('add-product');
        $vendor->givePermissionTo('edit-any-product');
        $vendor->givePermissionTo('remove-any-product');
        $vendor->givePermissionTo('view-all-carts');
        $vendor->givePermissionTo('edit-all-carts');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('answer-messages');
        $admin->givePermissionTo('view-unavailable-dogs');
        $admin->givePermissionTo('edit-any-dog');
        $admin->givePermissionTo('remove-any-dog');
        $admin->givePermissionTo('view-unavailable-products');
        $admin->givePermissionTo('edit-any-product');
        $admin->givePermissionTo('remove-any-product');
        $admin->givePermissionTo('view-all-carts');
        $admin->givePermissionTo('edit-all-carts');
        $admin->givePermissionTo('view-members');
        $admin->givePermissionTo('under-construction');

        Role::create(['name' => 'owner']);
    }
}
