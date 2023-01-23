<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Talents extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama',
        'Umur',
        'Alamat',
        'No',
        'Deskripsi',
        "Image"
    ];

    Public function Users(){
        return $this->belongsToMany(User::class,'Talents__Users');
    }
}
