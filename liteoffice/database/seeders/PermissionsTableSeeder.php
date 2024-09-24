<?php
// database/seeders/PermissionsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::firstOrCreate(['name' => 'manage_users'], ['display_name' => 'Manage Users']);
        Permission::firstOrCreate(['name' => 'edit_posts'], ['display_name' => 'Edit Posts']);
    }
}