<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class StudentInquiryModel extends Model
{
    protected $fillable = [
        'student_number',
        'student_firstname',
        'student_middlename',
        'student_lastname',
        'curriculumId'
    ];
}
