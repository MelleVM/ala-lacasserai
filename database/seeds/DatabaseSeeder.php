<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$akHCvTRpvma2eB8VOqUEoOtpWEelS2/e2TZK3LJyfLxuvw8MrQxVq', 'role_id' => 3, 'remember_token' => '', 'address' => '', 'residence' => '', 'postal_code' => ''],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
