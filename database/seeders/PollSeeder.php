<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poll::factory()->create(
            [
                'name' => 'Best Hotel and Spa',
                'question' => "What's your favourite hotel and spa?",
                'contenders' => [1, 2, 3, 4],
            ]
        );
    }
}
