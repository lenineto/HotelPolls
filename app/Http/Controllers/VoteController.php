<?php

    namespace App\Http\Controllers;

    use App\Jobs\ProcessVote;
    use App\Models\Vote;
    use Illuminate\Http\Request;
    use Inertia\Inertia;

    class VoteController extends Controller
    {
        public function store(Request $request)
        {
            // Dispatch the ProcessVote job
            ProcessVote::dispatch(
                $request->input('poll_id'),
                $request->input('contender_id'),
                $request->input('voter_id')
            );

            return redirect()->intended('/results/' . $request->input('poll_id'))->with('success', true);
        }

        public function show($poll_id)
        {
            return Inertia::render('Results', ['results' => (new Vote())->pollResults($poll_id)]);
        }
    }
