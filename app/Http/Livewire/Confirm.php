<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Confirm extends Component
{
    public $posts;
    public $requests;
    public $imgpath;
    
    public function render()
    {
        return view('livewire.confirm')
        ->layout('layouts.onform');
    }
    public function mount(){
        $this->posts = session()->get('posts');
        $this->imgpath = session()->get('path');
        // $this->requests = session()->get('requests');
    }
    public function back(){
        return redirect()->route('input');
    }
}
