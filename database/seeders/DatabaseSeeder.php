<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
    }
}
