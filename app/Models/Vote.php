<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['poll_id', 'contender_id', 'voter_id'];

    public function vote($poll_id, $contender_id, $voter_id): bool
    {
        return $this->fill(compact('poll_id', 'contender_id', 'voter_id'))->save();
    }

    public function pollResults($poll_id): array
    {
        $votes = $this->where('poll_id', $poll_id)->with('contender')->get();
        return [
            'poll' => Poll::getQuestion($poll_id),
            'totalVotes' => $votes->count(),
            'contenders' => $votes->groupBy('contender_id')->map(function ($item) {
                return ['name' => $item[0]->contender->name, 'votes' => $item->count()];
            })->toArray(),
        ];
    }

    public function hasVoted($poll_id, $voter_id)
    {
        return $this->where(compact('poll_id', 'voter_id'))->exists();
    }

    public function contender()
    {
        return $this->hasOne(Contender::class, 'id', 'contender_id');
    }
}
