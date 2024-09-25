<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'away_id',
        'home_id',
        'away_score',
        'home_score',
        'tournament_id',
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function away_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_id');
    }
    public function home_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_id');
    }
}
