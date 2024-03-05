<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';
    protected $fillable = ['poll_id', 'contender_id', 'voter_id'];
    public $timestamps = true;
    private $poll_id;
    private $contender_id;
    private $voter_id;

    public function vote($poll_id, $contender_id, $voter_id): bool
    {
        $this->poll_id = $poll_id;
        $this->contender_id = $contender_id;
        $this->voter_id = $voter_id;
        return $this->save();
    }
    public function pollResults($poll_id): array
    {
        $votes = $this->where('poll_id', $poll_id)->with(['contender'])->get();
        $results = [
            'poll' => Poll::getQuestion($poll_id),
            'totalVotes' => $votes->count(),
        ];
        $results['contenders'] = ($votes->groupBy('contender_id')->map(function ($item, $key) {
                return ['name' => $item[0]->contender->name, 'votes' => $item->count()];
        }))->toArray();
        return $results;
    }

    public function hasVoted($poll_id, $voter_id)
    {
        return $this->where('poll_id', $poll_id)->where('voter_id', $voter_id)->exists();
    }

    public function contender() :HasOne
    {
        return $this->hasOne(Contender::class, 'id', 'contender_id');
    }

//    public function user() :BelongsTo
//    {
//        return $this->belongsTo(User::class, 'voter_id');
//    }

//    public function polls() :HasMany
//    {
//        return $this->hasMany(Poll::class);
//    }


}
