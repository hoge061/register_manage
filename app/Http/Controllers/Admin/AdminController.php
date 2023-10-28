<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dash(Request $request){
        $sort = $request->sort != null? $request->sort : 'created_at';
        $items = RegisterUser::orderBy($sort,'desc')->paginate(20);
        $param = ['items' => $items, 'sort' => $sort];
        return view('admin.dashboard',$param);
    }

    public function detail(Request $request){
        $item = RegisterUser::find($request->id);
        Log::debug(asset('admin').'/'.$item->facepic);
        return view('admin.detail',['item' => $item]);
    }

    public function edit(Request $request){
        if($request->has('update')){
            // Log::debug('更新ボタン押された');
            $this->validate($request, RegisterUser::$rules);

            
            // Log::debug($path);
            $registeruser = RegisterUser::find($request->id);
            $form = $request->all();
            unset($form['_token']);

            $birthday = $request->birth_year.'-'.$request->birth_month.'-'.$request->birth_day;
            // Log::debug($birthday);
            $form['birthday'] = $birthday;
            if(isset($request->facepic)){
                $path = $request->file('facepic')->store('photos');
                $form['facepic'] = $path;
            }
            // Log::debug($form);
            
            $registeruser->fill($form)->save();
            $item = RegisterUser::find($request->id);

        }else if($request->has('delete')){
            // Log::debug('削除ボタン押された');
            RegisterUser::find($request->id)->delete();
            return redirect(route('admin.dashboard'));

        }else if($request->has('pdf_ks')){
            $pdf = Pdf::loadView('pdf.ks');
            return $pdf->setPaper('A5', 'landscape')->stream('求職票.pdf');
        }else if($request->has('pdf_es')){

        }
        return view('admin.detail',['item' => $item]);
    }

    public function checkassets(Request $request,$path=''){
        if($path==='') abort(404);

        $rp = Storage::disk('photos')->path($path);
        Log::debug($rp);
        if(File::exists($rp)){
            return response()->file($rp);
        }else{
            abort(404);
        }
    }
}
