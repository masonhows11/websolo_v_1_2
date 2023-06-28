<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $admin = Admin::create([
            'name' => 'naeem927',
            'first_name' => 'naeem',
            'last_name' => 'soltany',
            'mobile' => '09917230927',
            'email' => 'mason.hows11@gmail.com',
            'email_verified_at' => Carbon::now(),
            //'token'=>  mt_rand(111111,999999),
            //'email_verified_at' => Carbon::now(),
        ]);
        $admin1 = Admin::create([
            'name' => 'james423',
            'first_name' => 'joe',
            'last_name' => 'james',
            'mobile' => '09172890423',
            'email' => 'joe.james@gmail.com',
            'email_verified_at' => Carbon::now(),
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        $role_admin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $admin->assignRole($role_admin);


        $users = [
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
                'email' => 'nicky.wilson21@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230929',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
                'email' => 'mary.watson90@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230925',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
                'email' => 'john.marston1870@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230922',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
                'email' => 'david.bombal11@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230911',
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
