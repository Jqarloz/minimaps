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

        Permission::create(['name' => 'admin.home', 'description' => 'Admin - Inicio Dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Roles - Ver Listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Roles - Editar'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'Categorias - Ver Listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Categorias - Crear Nuevo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Categorias - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Categorias - Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description' => 'Etiquetas - Ver Listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.create', 'description' => 'Etiquetas - Crear Nuevo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'Etiquetas - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Etiquetas - Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.shops.index', 'description' => 'Negocios - Ver Listado'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.create', 'description' => 'Negocios - Crear Nuevo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.edit', 'description' => 'Negocios - Editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.shops.destroy', 'description' => 'Negocios - Eliminar'])->syncRoles([$role1,$role2]);

    }
}
