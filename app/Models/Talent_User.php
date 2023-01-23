<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent_User extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_id',
        'Talents_id'
    ];
}
