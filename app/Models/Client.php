<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['last_name','first_name','address','phone','bdate'];

    protected $casts = [
        'bdate' =>'datetime'
    ];
}