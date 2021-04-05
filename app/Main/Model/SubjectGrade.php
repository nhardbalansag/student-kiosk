<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    protected $fillable = [
        'final_grade',
        'curriculum_subject_id'
    ];
}
