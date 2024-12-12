<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table = 'cvs';
    protected $fillable = [
        'user_id', 'name', 'email', 'education', 'experience', 'skills', 'languages',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
