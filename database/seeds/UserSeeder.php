<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administratorRole = new Role();
        $administratorRole->name = 'administrator';
        $administratorRole->display_name = 'Administrator';
        $administratorRole->description = 'All Permission';
        $administratorRole->save();

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->description = 'Admin Permission';
        $adminRole->save();

        $clientRole = new Role();
        $clientRole->name = 'client';
        $clientRole->display_name = 'Client';
        $clientRole->description = 'Client Permission';
        $clientRole->save();

        $administrator = new user();
        $administrator->name = 'Jhon doe';
        $administrator->email = 'jhondoe@email.com';
        $administrator->password = bcrypt('12345');
        $administrator->save();
        $administrator->attachRole($administratorRole);

        $admin = new user();
        $admin->name = 'Aman admin';
        $admin->email = 'aman@email.com';
        $admin->password = bcrypt('23456');
        $admin->save();
        $admin->attachRole($adminRole);
        
        $client = new user();
        $client->name = 'Koe client';
        $client->email = 'koe@email.com';
        $client->password = bcrypt('34567');
        $client->save();
        $client->attachRole($clientRole);
    }
}
