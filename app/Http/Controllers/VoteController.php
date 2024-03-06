<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $vote = Vote::firstOrCreate(
            ['poll_id' => $request->input('poll_id'), 'voter_id' => $request->input('voter_id')],
            ['contender_id' => $request->input('contender_id')]
        );

        if ($vote->wasRecentlyCreated) {
            return redirect()->intended('/results/' . $vote->poll_id)->with('success', true);
        } else {
            return redirect()->back()->withErrors(['vote' => 'This poll is closed or you have already voted.']);
        }
    }

    public function show($poll_id)
    {
        return Inertia::render('Results', ['results' => (new Vote())->pollResults($poll_id)]);
    }
}
