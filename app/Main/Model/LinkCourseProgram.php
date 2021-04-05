<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class LinkCourseProgram extends Model
{
    protected $fillable = [
        'curiculum_courses_id_current',
        'curiculum_courses_id_next'
    ];
}
