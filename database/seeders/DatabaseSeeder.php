<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * List of applications to add.
     */
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'product-list',
        'product-create',
        'product-edit',
        'product-delete',
        'section-list',
        'section-create',
        'section-edit',
        'section-delete',
        'invoice-list',
        'invoice-create',
        'invoice-edit',
        'invoice-delete',
        'setting-list',
        'setting-create',
        'setting-edit',
        'setting-delete',
        'finance-list',
        'finance-create',
        'finance-edit',
        'finance-delete',
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $permissions = Permission::pluck('id', 'id')->all();

        $role = Role::create(['name' => 'Admin'])->syncPermissions($permissions);

        // Create admin User and assign the role to him.
        User::create([
            'name' => 'Ahmed Sheta',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole([$role->id]);

        Unit::create([
            'name' => 'وحدة',
        ]);
        // Create admin User and assign the role to him.
        /**
         * Spatie package
         */
        // $user = User::create([
        //     'name' => 'Ahmed Sheta',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('12345678')
        // ]);

        // $permissions = Permission::pluck('id', 'id')->all();

        // $role = Role::create(['name' => 'Admin']);

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
