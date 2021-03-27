<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
    protected $fillable = [
        'year_title',
        'description',
        'status'
    ];
}
