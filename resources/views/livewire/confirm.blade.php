@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

<div class="main">
    <h2>以下の内容で送信してよろしいですか？</h2>
    {{-- Stop trying to control. --}}
    <div class="text"><h4>氏名</h4><span>{{ @$posts['name'] }}</span></div>
    <div class="text"><h4>フリガナ</h4><span>{{ @$posts['furi'] }}</span></div>
    <div class="text"><h4>生年月日</h4><span>{{ @$posts['birth_year'] }}年{{ @$posts['birth_month'] }}月{{ @$posts['birth_day'] }}日</span></div>
    <div class="text"><h4>性別</h4><span>{{ @$posts['gender'] }}</span></div>
    <div class="text"><h4>郵便番号</h4><span>{{ @$posts['postcode'] }}</span></div>
    <div class="text"><h4>住所</h4><span>{{config('pref.'.@$posts['pref'])}}{{ @$posts['address1'] }}{{ @$posts['address2'] }}</span></div>
    <div class="text"><h4>携帯電話番号</h4><span>{{ @$posts['tel'] }}</span></div>
    <div class="text"><h4>メールアドレス</h4><span>{{ @$posts['email'] }}</span></div>
    <div class="text"><h4>希望職種</h4><span>{{ @$posts['job'] }}</span></div>
    <div class="text"><h4>希望勤務地</h4><span>
        {{-- @for($i=1; $i<=6; $i++)
            {{ @$posts['place'.$i] }}<br>
        @endfor --}}
        @foreach($posts['place'] as $value)
            @if($value != null)
            {{$value}}<br>
            @endif
        @endforeach

        {{-- {{@$posts['place']}} --}}
    </span></div>

    <div class="text"><h4>登録希望内容</h4>
    <span>
        @if(isset($posts['request']))
            @foreach($posts['request'] as $value)
            @if($value != null)
            {{$value}}<br>
            @endif
            @endforeach        
        @endif

    </span></div>
    <div class="text">
    <h4>顔写真</h4>

    {{-- @php
        echo $img_tmp;
    @endphp --}}
    @if($img_tmp)
        <img src="{{ $img_tmp }}" class="w-auto h-64">
    @else
        <span>ファイル選択なし</span>
    @endif
    </div>

    {{-- @if($facepic)
    <img src="{{ $facepic }}" alt="Uploaded Image" width="200">
    @endif --}}
    <div class="btns">
    <button
    wire:click="submit" class="css-button-arrow--sky">
    送信する
    </button>
    <button
    wire:click="back" class="css-button-shadow--green">
    修正する
    </button>
    </div>
</div>
