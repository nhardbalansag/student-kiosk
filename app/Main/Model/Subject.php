<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'total_units',
        'lecture_units',
        'lab_units',
        'subject_id',
        'status'
    ];
}






