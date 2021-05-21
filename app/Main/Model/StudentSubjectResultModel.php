<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class StudentSubjectResultModel extends Model
{
    protected $fillable = [
        'student_inquiry_id',
        'subject_title',
        'subject_prerequites_id',
        'status'
    ];
}
