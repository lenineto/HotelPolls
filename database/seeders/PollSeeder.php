<?php

    namespace Database\Seeders;

    use App\Models\Contender;
    use App\Models\Poll;
    use Faker\Factory as Faker;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class PollSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $limit = $this->command->ask('Please enter the limit for creating something !!', 1);

            $faker = Faker::create();
            if ($limit == 1) {
                $name = 'Best Hotel and Spa';
                $question = 'What is the best hotel and spa?';
                $contenders = [
                    'Best Hotel and Spa' => ['Hoar Cross Hall', 'Eden Hall', 'The Ritz-Carlton', 'The Four Seasons'],
                ];
            }

            $pollExists = $limit == 1 ? Poll::where('name', $name)->first() : false;

            for ($i = 0; $i < $limit; $i++) {
                if (!$pollExists) {
                    if ($limit > 1) {
                        $name = $faker->sentence(4, true);
                        $question = rtrim($faker->sentence(8, true), '.') . '?';
                        for ($j = 0; $j < 4; $j++) {
                            $contenders[$name][] = rtrim($faker->sentence(3, true), '.');
                        }
                    }
                        $pollId = (Poll::factory()->create(['name' => $name, 'question' => $question, 'contenders' => [], 'active' => 1]))->getOriginal('id');

                        foreach ($contenders[$name] as $contender) {
                            $record = Contender::factory()->create(['name' => $contender, 'poll_id' => $pollId]);
                            $contenderIds[] = $record->id;
                        }
                        Poll::updateContenders($pollId, $contenderIds);
                        $contenderIds = [];
                } else {
                    exit("Default Poll already exists\n");
                }
            }
        }
    }
