<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'subject_code',
        'description',
        'total_units',
        'lecture_units',
        'lab_units',
        'status'
    ];
}






