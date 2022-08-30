<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $alldata = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.index', compact('alldata'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function show($slug){
        $data = User::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.user.show', compact('data'));
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'role'=> ['required']
        ],[
            'name.required'=>'Please enter your name.',
            'email.required'=>'Please enter your email.',
            'password.required'=>'Please enter your password.',
            'role.required'=>'Please select user role.',
        ]);
        $slug = Str::slug($request['name'], '-');
        $insert = User::insertGetId([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'role_id' => $request['role'],
            'slug' => $slug,
            'status' => 1,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request -> hasFile('photo')){
            $image = $request->file('photo');
            $imageName = $insert . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/user/'.$imageName);

            User::where('id', $insert)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }

        if($insert){
            Session::flash('success','Successfully crete a new user completed.');
            return redirect()->route('user.index');
        }else{
            Session::flash('error','Opps! crete a new user failed.');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = User::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.user.edit',compact('data'));
    }

    public function update(Request $request){
        // dd($request->all());
        $id = $request['id'];
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'=> ['required']
        ],[
            'name.required'=>'Please enter your name.',
            'email.required'=>'Please enter your email.',
            'role.required'=>'Please select user role.',
        ]);

        $slug = Str::slug( $request['name'], '-' );
        $update = User::where('id',$id)->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'slug' => $slug,
            'role_id' => $request['role'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = $id . time() .'_'. rand(112000,11112000) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/user/'.$imageName);

            User::where('id',$id)->update([
                'photo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        if($update){
            Session::flash('success','Successfully Update User information.');
            return redirect()->route('user.index');
        }else{
            Session::flash('error','Opps!! Failded Update.');
            return redirect()->back();
        }
    }

    public function softdelete($slug){
        $soft = User::where('status',1)->where('slug',$slug)->update([
        'status'=>'0',
        'updated_at'=>Carbon::now()->toDateTimeString()
    ]);

        if($soft){
        Session::flash('success','Successfully delete user information.');
        return redirect()->back();
        }else{
        Session::flash('error','Opps! delete failed.');
        return redirect()->back();
        }
    }
}
