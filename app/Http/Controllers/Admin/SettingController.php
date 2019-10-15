<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\setting;

class SettingController extends Controller
{
    public function index(){
        $setting = setting::orderBy('sorting_number')->get();
        return view('admin.setting.index',compact('setting'));
    }

    public function update(Request $request)
    {
        foreach(array_except($request->toArray(),['_token']) as $name => $value)
        {
            setting::where('name',$name)->firstOrFail()->update(['value'=>$value]);
        }
        return redirect()->back()->withFlashMessage(trans('Admin Updated'));
    }
}
