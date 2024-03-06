<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contender extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'poll_id'];

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function vote() : HasMany
    {
       return $this->hasMany(Vote::class);
    }

    public function findByName(string $name): self
    {
        return $this->where('name', $name)->first()->id;
    }
}
