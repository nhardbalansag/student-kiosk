<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class CurriculumSubject extends Model
{
    protected $fillable = [
        'curiculum_courses_id',
        'subject_id',
        'pre_subject_id',
        'status'
    ];
}
