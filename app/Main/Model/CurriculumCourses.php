<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class CurriculumCourses extends Model
{
    protected $fillable = [
        'title',
        'status',
        'course_id',
        'year_id',
        'semester_id',
        'curriculum_id'
    ];
}








