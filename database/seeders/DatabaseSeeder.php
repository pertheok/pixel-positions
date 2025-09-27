<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        Ticket::factory(100)->recycle($users)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(JobSeeder::class);
        // $this->call(GreetingSeeder::class);
        // Article::factory(50)->create();

        User::create([
            'name' => 'The Manager',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'is_manager' => true,
        ]);
    }
}
