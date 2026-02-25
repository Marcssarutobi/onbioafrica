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
        'type_speaker_id'
    ];

    // 🔁 Relations
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function typeSpeaker()
    {
        return $this->belongsTo(TypeSpeaker::class);
    }
}
