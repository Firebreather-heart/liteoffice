<?php
// database/seeders/AdminUserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'lfbps@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole($adminRole);
    }
}