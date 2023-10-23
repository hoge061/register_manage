<?php

namespace App\Http\Livewire;

use App\Models\RegisterUser;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Confirm extends Component
{
    public $posts;
    public $requests;
    public $img_tmp;
    public $img_path;
    
    public function render()
    {
        return view('livewire.confirm')
        ->layout('layouts.onform');
    }
    public function mount(){
        $this->posts = session()->get('posts');
        $this->img_tmp = session()->get('img_tmp');
        $this->img_path = session()->get('img_path');
        // $this->requests = session()->get('requests');
    }
    public function back(){
        $this->img_tmp = null;
        session()->put('img_tmp', $this->img_tmp);
        return redirect()->route('real-valid');
    }
    public function submit(){
        RegisterUser::create([
            "name" => $this->posts['name'],
            "furi" => $this->posts['furi'],
            "birthday" => $this->mergebirtthday(),
            'gender' => $this->posts['gender'],
            'postcode' => $this->posts['postcode'],
            "address" => $this->mergeaddress(),
            "tel" => $this->posts['tel'],
            "email" => $this->posts['email'],
            'jobtype' => $this->posts['job'],
            'area_hakata' => $this->searchstr('福岡市博多区','place'),
            'area_chuo' => $this->searchstr('福岡市中央区','place'),
            'area_oonojo' => $this->searchstr('大野城市・太宰府市','place'),
            'area_tosu' => $this->searchstr('鳥栖市','place'),
            'area_saga' => $this->searchstr('佐賀市','place'),
            'area_kumamoto' => $this->searchstr('熊本市','place'),
            'registration_job_introduction' => $this->searchstr('職業紹介へ求職申し込みを希望','request'),
            'registration_worker_dispatch' => $this->searchstr('労働者派遣へ登録を希望','request'),
            'facepic' => $this->img_path,
            // "birthday" => '1996-12-18',
        ]);
        return redirect()->route('complete');
    }
    public function mergebirtthday(){
        $bitrhday = $this->posts['birth_year'].'-'.$this->posts['birth_month'].'-'.$this->posts['birth_day'];
        // Log::debug('検証1:'.$bitrhday);
        // Log::debug('検証2:'.date('Y-m-d',strtotime($bitrhday)));
        // return date('Y年m月d日',strtotime($bitrhday));
        return $bitrhday;
    }

    public function mergeaddress(){
        $address = config('pref.'.$this->posts['pref']).$this->posts['address1'].$this->posts['address2'];
        return $address;
    }
    public function searchstr($str,$propertyName){
        foreach($this->posts[$propertyName] as $val){
            if(strcmp($str,$val) == 0){
                return true;
            }
        }
        return false;
    }
}
