<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Add Role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Add User',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View User',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit User',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete User',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Master Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Add Master Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Master Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Master Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Export Master Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Add Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Property',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Attachments List',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Upload Attachments',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Add Employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Show Notifications',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Analytics',
                'guard_name' => 'web',
            ],
        ]);

        $super_admin = Role::create(['name' => 'Super Admin',
                                        'description' => 'This Role has Complete Authority, Not Modifiable',    
        ]);
        
        $scout = Role::create(['name' => 'Scout',
        'description' => 'This Role has Just Scouts Authority',    
        ]);
         
       //$adminpermissions = User::findOne('email','admin@ws.com')->first();
       $adminpermissions = User::where('email','admin@ws.com')->first();

       $adminpermissions->syncRoles($super_admin);

        $scout->syncPermissions(['Add Property',
                                'View Property',
                                'Edit Property',
                                'Delete Property',
                                'Attachments List',
                                'Upload Attachments']);
    }
}
