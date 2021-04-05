<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OutputFinalStatus extends Component
{
    public $current_curriculum;

    public function render()
    {
        return view('livewire.output-final-status');
    }

    public function CheckSubjects(){
        return redirect()->to('student/output-subject/' . $this->current_curriculum);
    }
}
