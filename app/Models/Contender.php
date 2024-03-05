<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contender extends Model
{
    use HasFactory;
    protected $table = 'contenders';
    protected $fillable = ['name', 'poll_id'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function vote() : HasMany
    {
       return $this->hasMany(Vote::class);
    }
}
