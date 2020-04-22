<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin',
        ]);

        User::create([
            'name' => 'Umer Bilal',
            'email' => 'umer@gamil.com',
            'password' => bcrypt('12345'),
            'role_id' => $role->id,
        ]);
    }
}
