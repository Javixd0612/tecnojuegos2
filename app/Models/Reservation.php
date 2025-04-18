<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'console_id',
        'start_time',
        'end_time',
    ];

    // Relación con Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Consola
    public function console()
    {
        return $this->belongsTo(Console::class);
    }

    
}