<?php

namespace App\Main\Model;

use Illuminate\Database\Eloquent\Model;

class PassedInfoModel extends Model
{
    protected $fillable = [
        'passedCount',
        'student_inquiry_id'
    ];
}
