<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    {{$items->appends(['sort' => $sort])->links() }}
                    <div>
                        <div class="flex justify-left gap-4">
                            <a href="?sort=name" class="w-2/6 hover:bg-gray-200">名前</a>
                            <a href="?sort=created_at" class="w-1/6 hover:bg-gray-200">登録日</a>
                            <a href="?sort=facepic" class="w-1/6 hover:bg-gray-200">画像</a>
                            <a href="?sort=status" class="w-1/6 hover:bg-gray-200">ステータス</a>
                        </div>
                        @foreach ($items as $item)
                        @php
                            $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d');   
                        @endphp
                            <a href="detail/{{$item->id}}">
                            <div class="flex justify-left gap-4 hover:bg-gray-200 h-12 items-center">
                                <div class="w-2/6">{{$item->name}}　({{$item->furi}})</div>
                                <div class="w-1/6">{{date($date)}}</div>
                                <div class="w-1/6">
                                    @if($item->facepic)
                                        写真有り
                                    @endif
                                </div>
                                <div class="w-1/6">
                                    @if($item->status == '0')
                                        <span>未対応</span>
                                    @elseif($item->status == '1')
                                        <span class="text-rose-600">対応中</span>
                                    @elseif($item->status == '2')
                                        <span class="text-emerald-600">対応済</span>
                                    @endif
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- {{$items->appends(['sort' => $sort])->links() }} --}}
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>
