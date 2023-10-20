<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;

class RealValid extends Component
{
    public $posts;
    public $facepic;
    public $imgpath;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.real-valid')
        ->layout('layouts.onform');
    }

    public function mount(){
        $this->posts = session()->get('posts');
    }

    protected $rules = [
        'posts.name' => 'required',
        'posts.furi' => 'required',
        'posts.birth_year' => 'required',
        'posts.birth_month' => 'required',
        'posts.birth_day' => 'required',
        'posts.postcode' => 'required|digits:7',
        'posts.pref' => 'required',
        'posts.address1' => 'required',
        'posts.tel' => 'required',
        'posts.email_confirmation' => 'required',
        'posts.email' => 'required|email|confirmed',
        'posts.job' => 'required',
    ];

    protected $messages = [
        'posts.name.required' => '氏名は必須です',
        'posts.furi.required' => 'フリガナは必須です',
        'posts.birth_year.required' => '年は必須です',
        'posts.birth_month.required' => '月は必須です',
        'posts.birth_day.required' => '日は必須です',
        'posts.postcode.required' => '郵便番号は必須です',
        'posts.postcode.digits' => '正しい郵便番号を入力してください',
        'posts.pref.required' => '都道府県は必須です',
        'posts.address1.required' => '市区町村以降の住所を入力してください',
        'posts.tel.required' => '携帯電話番号は必須です',
        'posts.email.required' => 'メールアドレスは必須です',
        'posts.email.email' => 'メールアドレスの形式が正しくありません',
        'posts.email.confirmed' => 'メールアドレスが一致しません',
        'posts.email_confirmation.required' => '確認のため入力してください',
        'posts.job.required' => '希望職種は必須です',
    ];

    public function updated($propertyName)
    {
        if(strcmp($propertyName,'posts.email_confirmation') == 0){
            $this->validateOnly('posts.email');
        }
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        // Contact::create($validatedData);
        session()->put('posts', $this->posts);
        // session()->put('facepic', $this->facepic);
        // $path = $this->facepic->store('photos');
        // session()->put('path', $path);
        // $this->imgpath = $this->facepic->getRealPath();
        session()->put('imgpath', $this->imgpath);
        // session()->put('requests', $request);
        return redirect()->route('confirm');
    }
}
