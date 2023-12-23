<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdrawal_account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'account_name',
        'bank_name',
        'bank_account',
    ];
}
