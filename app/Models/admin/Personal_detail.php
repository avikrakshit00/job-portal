<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dob',
        'age',
        'gender',
        'location',
        'qualification',
        'specialization',
        'skills',
        'other_skills',
        'mobile',
        'email',
        'image'

    ];
}
