<?php

    namespace Database\Seeders;

    use App\Models\Poll;
    use App\Models\User;
    use App\Models\Vote;
    use Illuminate\Database\Seeder;

    class VoteSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $limit = $this->command->ask('Please enter the maximum number of votes to cast PER POLL. Be careful!  ', 1);
            $users = User::all();

            Poll::all()->each(function ($poll) use ($limit, $users) {

                $contenders = $poll->getContenders();

                foreach ($contenders as $id => $name) {
                    $votesCount = rand(1, $limit);

                    for ($i = 0; $i < $votesCount; $i++) {
                        $user = $users->random();

                        // Check if the user has already voted on this poll
                        $existingVote = Vote::where('poll_id', $poll->id)
                            ->where('voter_id', $user->id)
                            ->first();

                        if (!$existingVote) {

                            Vote::factory()->create([
                                'poll_id' => $poll->id,
                                'contender_id' => $id,
                                'voter_id' => $user->id,
                            ]);
                        }

                    }
                }
            });
        }
    }
