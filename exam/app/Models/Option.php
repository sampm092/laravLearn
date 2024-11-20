<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Option extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'option_text', 'is_correct','question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
