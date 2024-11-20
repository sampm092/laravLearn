<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Question extends Model
    {
        use HasFactory, Notifiable;
        protected $fillable = [
            'question_text'
        ];
    
        public function options()
        {
            return $this->hasMany(Option::class);
        }
    }
