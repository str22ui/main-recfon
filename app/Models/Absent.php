<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    protected $table = 'absent';
    protected $fillable = [
        'user_id', 'typeWork', 'clockIn', 'clockOut', 'file', 'maps', 'todaysActivity', 'businessTrip','total','img'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
