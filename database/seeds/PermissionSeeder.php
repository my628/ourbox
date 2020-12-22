<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'create post']);
        
        // update permissions
        Permission::create(['name' => 'update post']);

        // retrieve permissions
        Permission::create(['name' => 'retrieve post']);

        // delete permissions
        Permission::create(['name' => 'delete post']);

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create post');
        $role2->givePermissionTo('update post');
        $role2->givePermissionTo('retrieve post');
        $role2->givePermissionTo('delete post');

        $role = Role::create(['name' => 'super-admin']);

        // gets all permissions via Gate::before rule; see AuthServiceProvider

         /*
                 $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');


        // create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
        */
    }
}
