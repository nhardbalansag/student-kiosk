<?php

namespace App\Main\Query;

use Illuminate\Database\Eloquent\Model;
use App\Main\Model\Curriculum;

class QueryBuilder extends Model
{
    public static function createCurriculum($request){
        Curriculum::create([
            'year_start_curiculum' => $request['year_start_curiculum'],
            'year_end_curiculum' => $request['year_end_curiculum'],
            'tittle' => $request['tittle'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);
    }
}
