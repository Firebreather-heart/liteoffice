<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use TCG\Voyager\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['display_name' => 'Admin']);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'fbc@firebase.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,

        ]);

        $admin->setRole('admin');
    }
}
