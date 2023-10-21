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
        $this->imgpath = session()->get('imgpath');
        // $this->requests = session()->get('requests');
    }
    public function back(){
        $this->imgpath = null;
        session()->put('imgpath', $this->imgpath);
        return redirect()->route('real-valid');
    }
}
