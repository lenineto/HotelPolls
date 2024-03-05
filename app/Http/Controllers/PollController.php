<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PollController extends Controller
{
    /**
     * Display a listing of active polls.
     */
    public function index($userID = null, $active = true)
    {
        $votedPolls = (new Vote)->where('voter_id', $userID)->get()->pluck('poll_id');
        return (new Poll)->getAvailablePolls($votedPolls->all());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null) {
    // Initialize an empty array for error messages
    $errors = [];

    // Retrieve the poll from the database
    $poll = Poll::with('contenders')->find($id);;

    // Check if the poll exists and is active
    if (!$poll || !$poll->active) {
        $errors['poll'] = 'This poll is closed.';
    }

    // Check if the user has already voted in this poll
    $vote = Vote::where('poll_id', $id)->where('voter_id', Auth::id())->first();
    if ($vote) {
        $errors['vote'] = 'You have already voted in this poll.';
    }

    // Return an Inertia response with the poll object, user id, and any error messages
    return Inertia::render('Vote', ['poll' => $poll, 'errors' => $errors]);
}

//    public function show($id = null)
//    {


//        // Retrieve the poll from the database
//        $poll = Poll::find($id);
//
//        // Check if the poll exists and is active
//        if (!$poll || !$poll->active) {
//            return redirect()->back()->withErrors(['poll' => 'The poll does not exist or is not active.']);
//        }
//
//        // Check if the user has already voted in this poll
//        $vote = Vote::where('poll_id', $id)->where('voter_id', Auth::id())->first();
//        if ($vote) {
//            return redirect()->back()->withErrors(['vote' => 'You have already voted in this poll.']);
//        }
//
//    // Return an Inertia response with the poll object and the user id
//    return Inertia::render('Vote', ['poll' => $poll]);

        /*
         * Safely retrieve and return a poll with its contenders,
         * or return null if the poll does not exist.
         */
//        $poll = $id ? (new Poll)->getPoll($id)::with('contenders')->get()->first() : null;
//        return $poll;

            /*
     * If the id is not valid or is not set, redirect to the dashboard.
     * That avoids the error of users trying to access a poll with an invalid,
     * or trying to access the poll page without an id.
     */
//    $poll = (new PollController())->show($id);
//    return $poll ? Inertia::render('Vote', ['poll' => $poll, 'success' => true]) : redirect()->route('dashboard');
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
