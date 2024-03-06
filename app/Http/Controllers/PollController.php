<?php

    namespace App\Http\Controllers;

    use App\Models\Poll;
    use App\Models\Vote;
    use Illuminate\Support\Facades\Auth;
    use Inertia\Inertia;

    class PollController extends Controller
    {
        public function index($userID = null, $active = true)
        {
            $polls = Poll::where('active', $active)->get();

            $votedPollIds = Vote::where('voter_id', $userID)->pluck('poll_id')->all();
            $pollsWithVotesIds = Vote::pluck('poll_id')->all();

            $polls->each(function ($poll) use ($votedPollIds, $pollsWithVotesIds) {
                $poll->user_voted = in_array($poll->id, $votedPollIds);
                $poll->has_votes = in_array($poll->id, $pollsWithVotesIds);
            });

            return $polls;
        }

        public function show($id = null)
        {
            $errors = [];
            $poll = Poll::with('contenders')->find($id);

            if (!$poll || !$poll->active) {
                $errors['poll'] = 'This poll is closed.';
            }

            $vote = Vote::where('poll_id', $id)->where('voter_id', Auth::id())->first();
            if ($vote) {
                $errors['vote'] = 'You have already voted in this poll.';
            }

            return Inertia::render('Vote', ['poll' => $poll, 'errors' => $errors]);
        }
    }
