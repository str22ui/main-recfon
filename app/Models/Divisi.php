<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';

    protected $fillable = ['division'];

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
