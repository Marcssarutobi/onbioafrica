<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abstractdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'phone',
        'affiliation',
        'title_resume',
        'content_resume',
        'status',
        'ispaid',
        'isinvite',
    ];
}
