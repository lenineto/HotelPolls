<?php

namespace Database\Seeders;

use App\Models\Contender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contenders = [
            'Best Hotel and Spa' => ['Hoar Cross Hall', 'Eden Hall', 'The Ritz-Carlton', 'The Four Seasons'],
        ];

        foreach ($contenders as $poll => $contenders) {
            foreach ($contenders as $contender) {
                Contender::factory()->create(['name' => $contender, 'poll_id' => \App\Models\Poll::where('name', $poll)->first()->id]);
            }
        }
    }
}
