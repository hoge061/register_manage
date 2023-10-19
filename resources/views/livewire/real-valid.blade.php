<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="saveContact">

        <span>氏名※：</span><input type="text" wire:model="posts.name">
        @error('posts.name') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>氏名（フリガナ）※:</span><input type="text" wire:model="posts.furi">
        @error('posts.furi') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>生年月日※:</span>

        <select wire:model="posts.birth_year">
            <option value="">----</option>
            @for ($i = 1943; $i <= date('Y')-15; $i++)
            <option value="{{ $i }}"@if(old('birth_year') == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>年

        <select wire:model="posts.birth_month">
            <option value="">--</option>
            @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}"@if(old('birth_month') == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>月

        <select wire:model="posts.birth_day">
            <option value="">--</option>
            @for ($i = 1; $i <= 31; $i++)
            <option value="{{ $i }}"@if(old('birth_day') == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>日

        @error('posts.birth_year') <span class="error">{{ $message }}</span> @enderror
        @error('posts.birth_month') <span class="error">{{ $message }}</span> @enderror
        @error('posts.birth_day') <span class="error">{{ $message }}</span> @enderror

        <br>
        <span>性別：</span>
        <input type="radio" wire:model="posts.gender" id="male" value="男">
        <label for="male">男</label>
        <input type="radio" wire:model="posts.gender" id="female" value="女">
        <label for="female">女</label>
        <br>

        <span>郵便番号※：</span>
        <input type="text" wire:model="posts.postcode" placeholder="ハイフン(-)なしで入力">
        @error('posts.postcode') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>住所※：</span>
        <select wire:model="posts.pref">
            <option value="">--</option>
            @foreach(config('pref') as $pref_id => $name)
              <option value="{{ $pref_id }}">{{ $name }}</option>
            @endforeach
        </select>
        <input type="text" wire:model="posts.address1" placeholder="市区町村建番地を入力">
        <input type="text" wire:model="posts.address2" placeholder="建物名・部屋番号場あれば入力">
        @error('posts.pref') <span class="error">{{ $message }}</span> @enderror
        @error('posts.address1') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>携帯電話番号※：</span>
        <input type="text" wire:model="posts.tel">
        @error('posts.tel') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>メールアドレス※:</span><input type="text" wire:model="posts.email_confirmation">
        @error('posts.email_confirmation') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>確認用メールアドレス※:</span><input type="text" wire:model="posts.email">

        @error('posts.email') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>希望職種：</span>
        <input type="radio" wire:model="posts.job" id="hotel" value="ブライダル及びホテル・レストランホール">
        <label for="hotel">ブライダル及びホテル・レストランホール</label>
        <input type="radio" wire:model="posts.job" id="sale" value="販売">
        <label for="sale">販売</label>
        <input type="radio" wire:model="posts.job" id="companion" value="パーティーコンパニオン">
        <label for="companion">パーティーコンパニオン</label>
        <input type="radio" wire:model="posts.job" id="cleaning" value="客室清掃">
        <label for="cleaning">客室清掃</label>
        <input type="radio" wire:model="posts.job" id="office" value="事務">
        <label for="office">事務</label>
        <input type="radio" wire:model="posts.job" id="other" value="その他">
        <label for="other">その他</label>
        @error('posts.job') <span class="error">{{ $message }}</span> @enderror
        <br>

        <span>希望勤務地(複数選択可)：</span>
        <input type="checkbox" wire:model="posts.place1" id="hakata" value="福岡市博多区">
        <label for="hakata">福岡市博多区</label>
        <input type="checkbox" wire:model="posts.place2" id="chuo" value="福岡市中央区">
        <label for="chuo">福岡市中央区</label>
        <input type="checkbox" wire:model="posts.place3" id="oono" value="大野城市・太宰府市">
        <label for="oono">大野城市・太宰府市</label>
        <input type="checkbox" wire:model="posts.place4" id="tosu" value="鳥栖市">
        <label for="tosu">鳥栖市</label>
        <input type="checkbox" wire:model="posts.place5" id="saga" value="佐賀市">
        <label for="saga">佐賀市</label>
        <input type="checkbox" wire:model="posts.place6" id="kuma" value="熊本市">
        <label for="kuma">熊本市</label>

        <br>

        <span>登録希望内容：</span>
        <input type="checkbox" wire:model="posts.reg-request1" id="reg-request-1" value="職業紹介へ求職申し込みを希望" checked>
        <label for="reg-request-1">職業紹介へ求職申し込みを希望</label>
        <input type="checkbox" wire:model="posts.reg-request2" id="reg-request-2" value="労働者派遣へ登録を希望" checked>
        <label for="reg-request-2">労働者派遣へ登録を希望</label>
        <br>
        
        <span>顔写真：</span>
        <input type="file" id="file" wire:model="facepic"><br>
        {{-- @if ($posts->facepic)
                @php
                    try {
                        $url = $posts->facepic->temporaryUrl();
                        $photoStatus = true;
                    }catch (RuntimeException $e){
                        $this->photoStatus = false;
                    }
                @endphp
                @if($photoStatus) <img src="{{ $url }}" class="w-auto h-64"> @endif
        @endif --}}

        {{-- @if($facepic)
        @php
            echo $facepic;
        @endphp
        @endif --}}
        

        <button type="submit">確認画面へ</button>

    </form>
</div>
