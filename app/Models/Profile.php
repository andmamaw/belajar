<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'headline',
        'bio',
        'education',
        'job_title',
        'company',
        'location',
        'email',
        'phone',
        'instagram',
        'linkedin',
    ];
}