<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_title',
        'course_description',
        'status'
    ];
}




