<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Main\Query\QueryBuilder;

class InputCurriculum extends Component
{
    public $course, $curriculum;
    public $studentNumberInfo, $curriculumInfo;

    public function render()
    {
        return view('livewire.input-curriculum');
    }

    public function searchSubjectAvailable(){

        return redirect()->to('student/input-grades/' . $this->curriculumInfo . '/' . $this->studentNumberInfo);
    }
}
