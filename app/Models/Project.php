<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'tech_stack',
        'project_link',
        'sort_order',
    ];
}