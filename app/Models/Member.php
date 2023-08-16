<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','organization_id'];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    
    public function organization() {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
