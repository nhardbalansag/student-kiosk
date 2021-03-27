<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}




