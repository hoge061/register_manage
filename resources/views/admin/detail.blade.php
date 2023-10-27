<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('求人登録者管理') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($errors->all() as $error)
                    <li class="text-rose-600">{{$error}}</li>
                    @endforeach

                <form action="{{route('admin.detail',['id' => $item->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                    $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d');   
                    @endphp
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">登録日</div>
                        <div>{{$date}}</div>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">ステータス</div>
                        <select name="status">
                            <option value="0" @if($item->status == 0) selected @endif>未対応</option>
                            <option value="1" @if($item->status == 1) selected @endif>対応中</option>
                            <option value="2" @if($item->status == 2) selected @endif>対応済</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">名前</div>
                        <input type="text" name="name" value="{{$item->name}}">
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">名前(フリガナ)</div>
                        <input type="text" name="furi" value="{{$item->furi}}">
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">生年月日</div>
                        <div>
                        <select>
                            @for ($i = 1943; $i <= date('Y')-15; $i++)
                            <option value="{{ $i }}"@if(strcmp(date('Y', strtotime($item->birthday)),$i)  == 0) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>年
                        <select>
                            @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}"@if(strcmp(date('n', strtotime($item->birthday)),$i)  == 0) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>月
                        <select>
                            @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}"@if(strcmp(date('d', strtotime($item->birthday)),$i)  == 0) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>日
                        </div>
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">性別</div>
                        <input type="radio" name="gender" id="male" value="男" @if(strcmp($item->gender,'男')==0)checked @endif>
                        <label for="male">男</label>
                        <input type="radio" name="gender" id="female" value="女" @if(strcmp($item->gender,'女')==0)checked @endif>
                        <label for="female">女</label>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">郵便番号</div>
                        <input type="text" name="postcode" value="{{$item->postcode}}">
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">住所</div>
                        <input class="w-2/6" type="text" name="address" value="{{$item->address}}">
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">携帯電話番号</div>
                        <input type="text" name="tel" value="{{$item->tel}}">
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">自宅電話番号</div>
                        <input type="text" name="home_tel" value="{{$item->home_tel}}">
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">メールアドレス</div>
                        <input type="text" class="w-2/6" name="email" value="{{$item->email}}">
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">希望職種</div>
                        <div>
                        <input type="radio" name="jobtype" id="hotel" value="ブライダル及びホテル・レストランホール" @if(strcmp($item->jobtype,'ブライダル及びホテル・レストランホール')==0)checked @endif>
                        <label for="hotel">ブライダル及びホテル・レストランホール</label><br>
                        <input type="radio" name="jobtype" id="sale" value="販売" @if(strcmp($item->jobtype,'販売')==0)checked @endif>
                        <label for="sale">販売</label><br>
                        <input type="radio" name="jobtype" id="companion" value="パーティーコンパニオン" @if(strcmp($item->jobtype,'パーティーコンパニオン')==0)checked @endif>
                        <label for="companion">パーティーコンパニオン</label><br>
                        <input type="radio" name="jobtype" id="cleaning" value="客室清掃" @if(strcmp($item->jobtype,'客室清掃')==0)checked @endif>
                        <label for="cleaning">客室清掃</label><br>
                        <input type="radio" name="jobtype" id="office" value="事務" @if(strcmp($item->jobtype,'事務')==0)checked @endif>
                        <label for="office">事務</label><br>
                        <input type="radio" name="jobtype" id="other" value="その他" @if(strcmp($item->jobtype,'その他')==0)checked @endif>
                        <label for="other">その他</label>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">希望勤務地</div>
                        <div>
                            <div>
                            <p>＜福岡県＞</p>
                            <input type="checkbox" name="area_hakata" id="hakata" value="1" @if($item->area_hakata) checked @endif>          
                            <label for="hakata">福岡市博多区</label>
                            <input type="checkbox" name="area_chuo" id="chuo" value="1" @if($item->area_chuo) checked @endif>
                            <label for="chuo">福岡市中央区</label>
                            <input type="checkbox" name="area_oonojo" id="oono" value="1" @if($item->area_oonojo) checked @endif>
                            <label for="oono">大野城市・太宰府市</label>
                            </div>
                            <div>
                            <p>＜佐賀県＞</p>
                            <input type="checkbox" name="area_tosu" id="tosu" value="1" @if($item->area_tosu) checked @endif>
                            <label for="tosu">鳥栖市</label>
                            <input type="checkbox" name="area_saga" id="saga" value="1" @if($item->area_saga) checked @endif>
                            <label for="saga">佐賀市</label>
                            </div>
                            <div>
                            <p>＜熊本県＞</p>
                            <input type="checkbox" name="area_kumamoto" id="kuma" value="1" @if($item->area_kumamoto) checked @endif>
                            <label for="kuma">熊本市</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">登録希望内容</div>
                        <div>
                            <div>
                                <input type="checkbox" name="registration_job_introduction" id="reg-request-1" value="1" @if($item->registration_job_introduction) checked @endif>
                                <label for="reg-request-1">職業紹介へ求職申し込みを希望</label><br>
                                <input type="checkbox" name="registration_worker_dispatch" id="reg-request-2" value="1" @if($item->registration_worker_dispatch) checked @endif>
                                <label for="reg-request-2">労働者派遣へ登録を希望</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">顔写真</div>
                        <div>
                            <div>
                                @if($item->facepic)
                                <img class="w-full max-w-xs" src="{{asset('admin').'/'.$item->facepic}}" alt="顔写真">
                                @else
                                画像なし
                                @endif
                                <div class="my-4">
                                    変更：<input type="file" name="facepic">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">質問や連絡が取りやすい時間等</div>
                            <textarea name="remarks" class="w-2/6">{{$item->remarks}}</textarea>
                    </div>

                    
                    <div class="flex items-center gap-4 py-2">
                        <div class="w-1/6">管理用備考欄</div>
                            <textarea name="admin_remarks" class="w-2/6">{{$item->admin_remarks}}</textarea>
                    </div>

                    <div class="flex justify-center gap-10 mt-12">
                        <button type="submit" name="pdf_ks" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">求職票作成</button>
                        <button type="submit" name="pdf_es" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">エントリーシート作成</button>    
                    </div>

                    <div class="flex justify-center gap-10 mt-12">
                        <button type="submit" name="update" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">内容を更新する</button>
                        <button type="submit" name="delete" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">削除する</button>    
                    </div>


                </form>
                </div>
            </div>
        </div>
    </div>
    
</x-admin-layout>
