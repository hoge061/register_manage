<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main.index');
    }
    public function on_register(){
        return view('main.on_register');
    }
    public function admin(){
        return view();
    }
}
