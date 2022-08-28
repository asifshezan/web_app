<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ResortController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $alldata = Resort::where('resort_status',1)->orderBy('resort_id','ASC')->get();
        return view('admin.resort.index', compact('alldata'));
    }

    public function create(){
        return view('admin.resort.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'resort_name' => 'required',
        ],[
            'resort_name.required' => 'Please enter Resort Name',
        ]);

        $slug = Str::slug($request['resort_name']);
        $insert = Resort::insertGetId([
            'resort_name' => $request->resort_name,
            'resort_detail' => $request['resort_detail'],
            'resort_slug' => $slug,
            'resort_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('resort_image')){
            $image = $request->file('resort_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/resort/' . $imageName);

            Resort::where('resort_id',$insert)->update([
                'resort_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

            if($insert){
                Session::flash('success','successfully insert resort');
                return redirect()->route('resort.index');
            }else{
                Session::flash('error','Opps! Failed to insert.');
                return redirect()->back();
            }

        }

}
