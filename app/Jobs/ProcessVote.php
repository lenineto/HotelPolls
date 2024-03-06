<?php

namespace App\Jobs;

use App\Models\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessVote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $poll_id;
    protected $contender_id;
    protected $voter_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($poll_id, $contender_id, $voter_id)
    {
        $this->poll_id = $poll_id;
        $this->contender_id = $contender_id;
        $this->voter_id = $voter_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $vote = new Vote;
        $vote->vote($this->poll_id, $this->contender_id, $this->voter_id);
    }
}
