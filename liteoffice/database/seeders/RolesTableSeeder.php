<?php
// database/seeders/RolesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin'], ['display_name' => 'Admin']);
        Role::firstOrCreate(['name' => 'user'], ['display_name' => 'User']);
    }
}