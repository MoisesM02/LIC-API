<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'Prize',
    ];

    public function matches(): HasMany
    {
        return $this->hasMany(FMatch::class);
    }
}
