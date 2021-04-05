<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Main\Query\QueryBuilder;

class SetGrade extends Component
{
    public $grades, $curriculum_subjects_id, $pre_data;

    public $subjStatus = array();


    public function render()
    {
        return view('livewire.set-grade');
    }

    public function set_grade(){

        $data = [
            'final_grade' => $this->grades,
            'curriculum_subject_id' => $this->curriculum_subjects_id
        ];

        // QueryBuilder::createSubjectGrade($data);

        array_push(
            $this->subjStatus,
            array(
                'subject' => array(
                    'subject_title' => $this->grades
                )
            )
        );

        return $this->subjStatus;

    }

    public function outputdata(){
        dd($this->set_grade());
    }

}
