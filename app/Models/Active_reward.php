<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active_reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'rank',
        'round',
        'team',
    ];
}
