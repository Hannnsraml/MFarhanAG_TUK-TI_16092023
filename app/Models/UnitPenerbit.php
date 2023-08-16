<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPenerbit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'unit',
    ];

    protected $table = 'unit_penerbit';
}
