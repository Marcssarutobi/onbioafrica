<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'session_title',
        'session_type',
        'speaker_id',
        'location',
        'isPublished',
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'isPublished' => 'boolean',
    ];

    // 🔁 Relations
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
