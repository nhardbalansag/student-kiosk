<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'year_start_curiculum',
        'year_end_curiculum',
        'tittle',
        'description',
        'status'
    ];
}
