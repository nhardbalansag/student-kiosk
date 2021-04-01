<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Prerequisites extends Model
{
    protected $fillable = [
        'prerequisites_title',
        'prerequisites_subject_code',
        'prerequisites_subject_id'
    ];
}
