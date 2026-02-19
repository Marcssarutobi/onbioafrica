<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'country',
        'affiliation',
        'bio',
        'photo',
        'type',
    ];

    // 🔁 Relations
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
