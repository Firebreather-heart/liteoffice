<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Log::info('DatabaseSeeder started.');

        $this->call([
            // Uncomment the following line if AdminUserSeeder is needed
            // AdminUserSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
        ]);

        $userEmail = 'lfbps@gmail.com';
        Log::info("Looking for user with email {$userEmail}.");

        try {
            $user = User::where('email', $userEmail)->first();
            if ($user) {
                Log::info("User with email {$user->email} found.");
                $adminRole = Role::where('name', 'admin')->first();
                if ($adminRole) {
                    Log::info("Admin role found.");
                    $user->roles()->attach($adminRole);
                    Log::info("User with email {$userEmail} has been granted the 'admin' role.");
                } else {
                    Log::info("Admin role not found.");
                }
            } else {
                Log::info("User with email {$userEmail} not found.");
            }
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
        }

        Log::info('DatabaseSeeder finished.');
    }
}