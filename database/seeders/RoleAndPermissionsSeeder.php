<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Admin::create([
//            'name' => "Super admin",
//            'email' =>'admin@gmail.com',
//            'password' =>Hash::make('123456'),
//        ]);
//
//        $roles = ['admin'];
//        foreach($roles as $role){
//        Role::create([
//            'name' => $role,
//            'guard_name' => 'admin'
//        ]);
//        }
//        Role::create(['name'=>'customer', 'guard_name' => 'customer']);
//
//        DB::table('model_has_roles')->insert([
//            'role_id' => 1,
//            'model_id' => 1,
//            'model_type' => 'modules\Admins\Models\Admin'
//        ]);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'age' => 22,
        ]);

        $admin = Admin::create([
            'salary' => 2000,
            'isSuperAdmin' => 1,
            'user_id' => $user->id,
        ]);


        $roles = ['admin', 'customer'];
        foreach($roles as $role){
            Role::create([
                'name' => $role,
            ]);
        }


        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_id' => 1,
            'model_type' => 'App\Models\User'
        ]);




        $permissions = [
            'create-admin', 'edit-admin', 'view-admin', 'delete-admin', 'restore-admin',
            'create-customer', 'edit-customer', 'delete-customer', 'view-customer', 'restore-customer',
            'create-review', 'edit-review', 'view-review', 'delete-review', 'restore-review',
            'create-category', 'edit-category', 'delete-category', 'view-category', 'restore-category',
            'create-role', 'edit-role', 'delete-role', 'view-role', 'restore-role',
            'create-permission', 'edit-permission', 'delete-permission', 'view-permission', 'restore-permission',
            'create-movie', 'edit-movie', 'delete-movie', 'view-movie', 'restore-movie'
        ];

        $adminPermissions = ['create-admin', 'edit-admin', 'view-admin', 'delete-admin', 'restore-admin',
            'create-customer', 'edit-customer', 'delete-customer', 'view-customer', 'restore-customer',
            'create-category', 'edit-category', 'delete-category', 'view-category', 'restore-category',
            'create-role', 'edit-role', 'delete-role', 'view-role', 'restore-role',
            'create-permission', 'edit-permission', 'delete-permission', 'view-permission', 'restore-permission',
            'create-review', 'edit-review', 'view-review', 'delete-review', 'restore-review',
            'create-movie', 'edit-movie', 'delete-movie', 'view-movie', 'restore-movie'];

        $customerPermissions = ['create-review', 'edit-review', 'view-review', 'delete-review', 'restore-review',
            'view-movie', 'edit-customer', 'view-customer', 'view-category' ];

//        foreach ($adminPermissions as $permission) {
//            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
//        }
//
//        foreach ($customerPermissions as $permission) {
//            Permission::create(['name' => $permission, 'guard_name' => 'customer']);
//        }
        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }


//        $superAdmin = Admin::get()->first();
//        $superAdmin->assignRole('super-admin');
//
//        $roleSuperAdmin = Role::first();
//        $roleSuperAdmin->givePermissionTo($adminPermissions);
//
//        $roleCustomer = Role::find(3);
//        $roleCustomer->givePermissionTo($customerPermissions);

//        $roleUser = Role::findById(3);
//        $roleUser->givePermissionTo(['create-product', 'edit-product', 'view-product', 'delete-product', 'restore-product',
//            'create-customer', 'edit-customer', 'view-customer', 'view-order', 'edit-user', 'view-user']);


        $user->assignRole('admin');
        $roleAdmin = Role::first();
        $roleAdmin->givePermissionTo($adminPermissions);

    }
}
