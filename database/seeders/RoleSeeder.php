<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleSubscriber = Role::create(['name' => 'Suscriptor']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$roleAdmin, $roleEditor]);

        Permission::create(['name' => 'admin.user.index'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.user.create'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.user.edit'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.user.destroy'])->assignRole($roleAdmin);

        Permission::create(['name' => 'post.list'])->syncRoles([$roleAdmin, $roleEditor]);
        Permission::create(['name' => 'post.create'])->syncRoles([$roleAdmin, $roleEditor]);
        Permission::create(['name' => 'post.edit'])->syncRoles([$roleAdmin, $roleEditor]);
        Permission::create(['name' => 'post.destroy'])->syncRoles([$roleAdmin, $roleEditor]);
    }
}
