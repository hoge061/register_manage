<div>
    {{-- Stop trying to control. --}}
    <span>氏名：</span><span>{{ @$posts['name'] }}</span><br>
    <span>フリガナ：</span><span>{{ @$posts['furi'] }}</span><br>
    <span>生年月日：</span><span>{{ @$posts['birth_year'] }}年{{ @$posts['birth_month'] }}月{{ @$posts['birth_day'] }}日</span><br>
    <span>性別：</span><span>{{ @$posts['gender'] }}</span><br>
    <span>郵便番号：</span><span>{{ @$posts['postcode'] }}</span><br>
    <span>住所:</span><span>{{config('pref.'.@$posts['pref'])}}{{ @$posts['address1'] }}{{ @$posts['address2'] }}</span><br>
    <span>携帯電話番号：</span><span>{{ @$posts['tel'] }}</span><br>
    <span>メールアドレス：</span><span>{{ @$posts['email'] }}</span><br>
    <span>希望職種：</span><span>{{ @$posts['job'] }}</span><br>
    <span>希望勤務地：</span><span>
        @for($i=1; $i<=6; $i++)
            {{ @$posts['place'.$i] }}
        @endfor
    </span><br>
    <span>登録希望内容：</span><span>{{ @$posts['reg-request1'] }}{{ @$posts['reg-request2'] }}</span><br>
    <span>顔写真：</span>

    @php
        echo asset('storage') .'/'. $imgpath;
    @endphp

    {{-- <img src="{{ $imgpath }}" class="w-auto h-64"> --}}

    {{-- @if($facepic)
    <img src="{{ $facepic }}" alt="Uploaded Image" width="200">
    @endif --}}
    <br><button
    wire:click="back">
    修正
    </button>
</div>
