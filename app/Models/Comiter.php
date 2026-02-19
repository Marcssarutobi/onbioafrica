<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comiter extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'post',
        'image',
    ];
}
