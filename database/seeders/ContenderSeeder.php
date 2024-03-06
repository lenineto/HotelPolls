<?php

namespace Database\Seeders;

use App\Models\Contender;
use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(bool $original = false, int $count = 1): void
    {
//        if ($original) {
//            $contenders = [
//                'Best Hotel and Spa' => ['Hoar Cross Hall', 'Eden Hall', 'The Ritz-Carlton', 'The Four Seasons'],
//            ];
//
//            foreach ($contenders as $poll => $contenders) {
//                foreach ($contenders as $contender) {
//                    Contender::factory()->create(['name' => $contender, 'poll_id' => Poll::where('name', $poll)->first()->id]);
//                }
//            }
//        } else {
//            $faker = Faker::create();
//
//            for ($i = 0; $i < $count; $i++) {
//                $poll = Poll::factory()->create(['name' => $faker->sentence]);
//
//                for ($j = 0; $j < 4; $j++) {
//                    Contender::factory()->create(['name' => $faker->name, 'poll_id' => $poll->id]);
//                }
//            }
//        }
    }
}
