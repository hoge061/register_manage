<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Complete extends Component
{
    public function render()
    {
        return view('livewire.complete')
        ->layout('layouts.onform');
    }
}
