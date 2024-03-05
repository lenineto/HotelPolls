<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Poll extends Model
{
    use HasFactory;
    protected $table = 'polls';
    protected $fillable = ['name', 'question', 'contenders', 'active'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;

    protected $casts = [
        'name' => 'string',
        'question' => 'string',
        'contenders' => 'array',
        'active' => 'boolean'
    ];

    public static function getQuestion(mixed $id)
    {
        return Poll::find($id)->question;
    }


    public function createPoll($name, $contenders)
    {
        $poll = new Poll();
        $poll->name = $name;
        $poll->contenders = $contenders;
        $poll->active = 0;
        $poll->save();
    }

    public function closePoll($id)
    {
        $poll = Poll::find($id);
        $poll->active = 0;
        $poll->save();
    }

    public function openPoll($id)
    {
        $poll = Poll::find($id);
        $poll->active = 1;
        $poll->save();
    }

    public function getPoll($id)
    {
        return Poll::find($id)->first();
    }

    public function getPolls($active = false)
    {
        if ($active) {
            return Poll::where('active', $active)->get();
        }
        return Poll::all();
    }


    public function updatePoll($id, $name, $contenders)
    {
        $poll = Poll::find($id);
        $poll->name = $name;
        $poll->contenders = $contenders;
        $poll->save();
    }

    public function deletePoll($id)
    {
        $poll = Poll::find($id);
        $poll->delete();
    }

    public function getPollByName($name)
    {
        return Poll::where('name', $name)->first();
    }

    public function contenders() :HasMany
    {
        return $this->hasMany(Contender::class);
    }

    public function getAvailablePolls($exclude = [], $active = true) {
        return Poll::where('active', $active)->whereNotIn('id', $exclude)->get();
    }

}
