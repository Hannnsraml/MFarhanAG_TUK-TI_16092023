<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengesah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
    ];

    protected $table = 'pengesah';
}
