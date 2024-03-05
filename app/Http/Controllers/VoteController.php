<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Poll;
use App\Models\Vote;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

//        return inertia('Vote');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($poll_id)
    {
        return Inertia::render('Results', ['results' => (new Vote())->pollResults($poll_id)]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
