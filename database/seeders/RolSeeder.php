<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperUser']);
        $role2 = Role::create(['name' => 'UserMinimap']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.shops.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.destroy'])->syncRoles([$role1,$role2]);

    }
}
