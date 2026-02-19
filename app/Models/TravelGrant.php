<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelGrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'phone',
        'institution',
        'country',
        'doc_path',
        'status',
    ];

    protected $casts = [
        'doc_path' => 'array',
    ];
}
