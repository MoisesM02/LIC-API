<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'league',
    ];


    public function players(): HasMany
    {
        return $this->hasMany(Player::class)->chaperone();
    }

    public function matches_away(): HasMany
    {
        return $this->hasMany(FMatch::class, 'away_id');
    }

    public function matches_home(): HasMany
    {
        return $this->hasMany(FMatch::class, 'home_id');
    }

  
}
