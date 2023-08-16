<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','nim','ttl','alamat'];

    public function members()
    {
        return $this->hasMany(Member::class, 'student_id', 'id');
    }
}
