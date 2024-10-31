<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover', 'title', 'author', 'desc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
