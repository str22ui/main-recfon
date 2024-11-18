<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'college';
    protected $fillable = ['college'];

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
