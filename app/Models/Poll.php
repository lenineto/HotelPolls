<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'question', 'contenders', 'active'];

    protected $casts = [
        'name' => 'string',
        'question' => 'string',
        'contenders' => 'array',
        'active' => 'boolean'
    ];

    public function contenders(): HasMany
    {
        return $this->hasMany(Contender::class);
    }
    public static function getQuestion($id)
    {
        return self::find($id)->question;
    }
    public function getContenders()
    {
        return $this->contenders()->get()->pluck('name', 'id')->toArray();
    }

    public function createPoll($name, $contenders)
    {
        return $this->fill(compact('name', 'contenders', 'active'))->save();
    }

    public function updatePollStatus($id, $active)
    {
        return self::find($id)->update(compact('active'));
    }

    public function getPoll($id)
    {
        return self::find($id);
    }

    public function getPolls($active = false)
    {
        return $active ? self::where(compact('active'))->get() : self::all();
    }

    public static function updateContenders(int $id, array $contenderIds = [])
    {
        return self::find($id)->update(['contenders' => $contenderIds]);
    }

    public function deletePoll($id)
    {
        return self::find($id)->delete();
    }

    public function getPollByName($name)
    {
        return self::where(compact('name'))->first();
    }

    public function getAvailablePolls($exclude = [], $active = true) {
        return self::where(compact('active'))->whereNotIn('id', $exclude)->get();
    }
}
