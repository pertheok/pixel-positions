<?php

namespace Database\Seeders;

use App\Models\Greeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['greeting' => 'Hello'],
            ['greeting' => 'Hi'],
            ['greeting' => 'Howdy'],
            ['greeting' => 'Hey'],
        ];

        foreach ($data as $entry)
        {
            Greeting::create($entry);
        }
    }
}
