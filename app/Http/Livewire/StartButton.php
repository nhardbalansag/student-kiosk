<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StartButton extends Component
{
    public function render()
    {
        return view('livewire.start-button');
    }

    public function start(){
        return redirect()->to('student/input-curriculum');
    }
}
