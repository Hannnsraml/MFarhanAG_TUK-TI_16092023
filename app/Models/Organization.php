<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['ukm_name','deskripsi'];

    public function members()
    {
        return $this->hasMany(Member::class, 'organization_id', 'id');
    }
}
