<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="saveContact" class="onreg" enctype="multipart/form-data">

        <span>氏名a</span>
        @error('posts.name') <span class="error">{{ $message }}</span>@enderror
        <div>
            <input type="text" wire:model="posts.name"> 
        </div>
        
        

        <span>氏名（フリガナ）</span>
        @error('posts.furi') <span class="error">{{ $message }}</span> @enderror
        <div>
            <input type="text" wire:model="posts.furi"> 
        </div>
        
        

        <span>生年月日</span>
        @error('posts.birth_year') <span class="error">{{ $message }}</span> @enderror
        @error('posts.birth_month') <span class="error">{{ $message }}</span> @enderror
        @error('posts.birth_day') <span class="error">{{ $message }}</span> @enderror
        <div>
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
        </div>



        
        <span>性別</span>
        <div>
            <input type="radio" wire:model="posts.gender" id="male" value="男">
            <label for="male">男</label>
            <input type="radio" wire:model="posts.gender" id="female" value="女">
            <label for="female">女</label>
        </div>
        

        <span>郵便番号</span>
        @error('posts.postcode') <span class="error">{{ $message }}</span> @enderror
        <div>
        <input type="text" wire:model="posts.postcode" placeholder="ハイフン(-)なしで入力">
        </div>
        

        <span>住所</span>
        @error('posts.pref') <span class="error">{{ $message }}</span> @enderror
        @error('posts.address1') <span class="error">{{ $message }}</span> @enderror
        <div>
        <select wire:model="posts.pref">
            <option value="">--</option>
            @foreach(config('pref') as $pref_id => $name)
              <option value="{{ $pref_id }}">{{ $name }}</option>
            @endforeach
        </select>
        <input type="text" wire:model="posts.address1" placeholder="市区町村建番地を入力">
        <input type="text" wire:model="posts.address2" placeholder="建物名・部屋番号場あれば入力">
        </div>
        

        <span>携帯電話番号</span>
        @error('posts.tel') <span class="error">{{ $message }}</span> @enderror
        <div>
        <input type="text" wire:model="posts.tel">
        </div>
        
        <span>メールアドレス</span>
        @error('posts.email') <span class="error">{{ $message }}</span> @enderror
        <div>
        <input type="text" wire:model="posts.email">
        </div>
        

        <span>確認用メールアドレス</span>
        @error('posts.email_confirmation') <span class="error">{{ $message }}</span> @enderror
        <div>
        <input type="text" wire:model="posts.email_confirmation">
        </div>
        

        <span>希望職種</span>
        @error('posts.job') <span class="error">{{ $message }}</span> @enderror
        <div>
        <input type="radio" wire:model="posts.job" id="hotel" value="ブライダル及びホテル・レストランホール">
        <label for="hotel">ブライダル及びホテル・レストランホール</label><br>
        <input type="radio" wire:model="posts.job" id="sale" value="販売">
        <label for="sale">販売</label><br>
        <input type="radio" wire:model="posts.job" id="companion" value="パーティーコンパニオン">
        <label for="companion">パーティーコンパニオン</label><br>
        <input type="radio" wire:model="posts.job" id="cleaning" value="客室清掃">
        <label for="cleaning">客室清掃</label><br>
        <input type="radio" wire:model="posts.job" id="office" value="事務">
        <label for="office">事務</label><br>
        <input type="radio" wire:model="posts.job" id="other" value="その他">
        <label for="other">その他</label>
        </div>
        

        <span>希望勤務地(複数選択可)</span>
        <div>
            <div>
            <p>＜福岡県＞</p>
            <input type="checkbox" wire:model="posts.place.1" id="hakata" value="福岡市博多区">          
            <label for="hakata">福岡市博多区</label>
            <input type="checkbox" wire:model="posts.place.2" id="chuo" value="福岡市中央区">
            <label for="chuo">福岡市中央区</label>
            <input type="checkbox" wire:model="posts.place.3" id="oono" value="大野城市・太宰府市">
            <label for="oono">大野城市・太宰府市</label>
            </div>
            <div>
            <p>＜佐賀県＞</p>
            <input type="checkbox" wire:model="posts.place.4" id="tosu" value="鳥栖市">
            <label for="tosu">鳥栖市</label>
            <input type="checkbox" wire:model="posts.place.5" id="saga" value="佐賀市">
            <label for="saga">佐賀市</label>
            </div>
            <div>
            <p>＜熊本県＞</p>
            <input type="checkbox" wire:model="posts.place.6" id="kuma" value="熊本市">
            <label for="kuma">熊本市</label>
            </div>
        </div>

        

        <span>登録希望内容</span>
        <div>
        <input type="checkbox" wire:model="posts.request.1" id="reg-request-1" value="職業紹介へ求職申し込みを希望" checked>
        <label for="reg-request-1">職業紹介へ求職申し込みを希望</label><br>
        <input type="checkbox" wire:model="posts.request.2" id="reg-request-2" value="労働者派遣へ登録を希望" checked>
        <label for="reg-request-2">労働者派遣へ登録を希望</label>
        </div>
        
        
        <span>顔写真</span>
        
        <div x-data="{ files: null }">
            @error('facepic') <span class="error">{{ $message }}</span><br> @enderror
            <button type="button" class="btn-file" x-on:click="document.querySelector('#file').click()">ファイルを選択</button>
            <input type="file" id="file" wire:model="facepic" x-on:change="files = Object.values($event.target.files);">
            <p class="file-names" x-text="files ? files.map(file => file.name).join(', ') : 'ファイルが選択されていません。'"></p>
        </div>

        {{-- <label class="border-2 border-gray-200 p-3 w-full block rounded cursor-pointer my-2" for="customFile" x-data="{ files: null }">
            <input type="file" class="sr-only" id="customFile" x-on:change="files = Object.values($event.target.files)">
            <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose single file...'"></span>
          </label> --}}

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
        
        <div class="confirm">
            <button type="submit" class="css-button-sliding-to-bottom--blue">確認画面へ</button>
        </div>
        
        

    </form>
</div>
