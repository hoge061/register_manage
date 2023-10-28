<?php

namespace App\Http\Livewire;

use Error;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;

class RealValid extends Component
{
    public $posts;
    public $facepic;
    public $img_tmp;
    public $img_path;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.real-valid')
        ->layout('layouts.onform');
    }

    public function mount(){
        session()->has('posts') ? $this->posts = session()->get('posts') :null;
        session()->has('img_tmp') ? $this->posts = session()->get('img_tmp') :null;
        session()->has('img_path') ? $this->posts = session()->get('img_path') :null;
        $this->posts['request'] = [1 => '職業紹介へ求職申し込みを希望',2=>'労働者派遣へ登録を希望'];
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
        'facepic' =>'max:1024',
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
        'facepic.max' =>'ファイルサイズは1MB以内で選択して下さい。',
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
        try{
            $this->img_path = $this->facepic->store('photos');
            // $this->img_path = storage_path('app\\'.$this->img_path);
            $this->img_tmp = $this->facepic->temporaryUrl();
            // Log::debug('検証1:'.storage_path('app\\'.$this->img_path));
            Log::debug('検証1:'.$this->img_path);
        }catch(Error $e){
            // $this->imgpath = null;
        }
        
        // session()->put('path', $path);
        session()->put('img_tmp', $this->img_tmp);
        session()->put('img_path', $this->img_path);
        // session()->put('requests', $request);
        return redirect()->route('confirm');
    }
}
