<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'year',
        'status',
        'title',
        'description'
    ];
}
