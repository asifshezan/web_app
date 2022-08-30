<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $alldata = Role::where('role_status',1)->orderBy('role_id','DESC')->get();
        return view('admin.role.index', compact('alldata'));
    }

    public function create(){
        return view('admin.role.create');
    }

    public function store(Request $request){
        $slug = Str::slug($request['role_name'], '-');
        $insert = Role::insertGetId([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'role_status' => 1,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','Successfully registration completed.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Registration failed.');
            return redirect()->back();
        }
    }

    public function show($slug){
        $data = Role::where('role_status',1)->where('role_slug',$slug)->firstOrFail();
        return view('admin.role.show', compact('data'));
    }

    public function edit($slug){
        $data = Role::where('role_status',1)->where('role_slug',$slug)->firstOrFail();
        return view('admin.role.edit', compact('data'));
    }

    public function update(Request $request){
        $id = $request['role_id'];
        $slug = Str::slug($request['role_name'], '-');
        $update = Role::where('role_id',$id)->update([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success', 'Successfully update role information.');
            return redirect()->route('role.index');
        }else{
            Session::flash('error', 'Opps! failed update.');
            return redirect()->back();
        }
    }

    public function softdelete($slug){
        $soft = Role::where('role_status',1)->where('role_slug',$slug)->update([
            'role_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            Session::flash('success','Successfully Delete.');
            return redirect()->back();
        }else{
            Session::flash('error','Oppps! Failed Delete.');
            return redirect()->back();
        }
    }
}
