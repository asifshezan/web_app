<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $alldata = Booking::where('booking_status',1)->orderBy('booking_id','ASC')->get();
        return view('admin.booking.index', compact('alldata'));
    }

        public function show($slug){
            $data = Booking::where('booking_status',1)->where('booking_slug',$slug)->firstOrFail();
            return view('admin.booking.show', compact('data'));
        }

        public function softdelete($slug){
            $soft = Booking::where('booking_status',1)->where('booking_slug',$slug)->update([
                'booking_status' => 0,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

            if($soft){
                Session::flash('success','Successfully SoftDelete booking.');
                return redirect()->back();
            }else{
                Session::flash('error','Opps! Failed to SoftDelete.');
                return redirect()->back();
            }
        }

}
