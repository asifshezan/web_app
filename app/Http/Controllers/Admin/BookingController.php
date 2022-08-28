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

    // public function store(Request $request){
    //     $this->validate($request,[
    //         'booking_start_date' => 'required',
    //         'booking_end_date' => 'required',
    //     ],[
    //         'booking_start_date.required' => 'Please enter Booking start date',
    //         'booking_end_date.required' => 'Please enter Booking end date',
    //     ]);

    //     $slug = uniqid();
    //     $insert = Booking::insertGetId([
    //         'resort_id' => $request->resort_id,
    //         'booking_start_date' => $request['booking_start_date'],
    //         'booking_end_date' => $request['booking_end_date'],
    //         'booking_phone' => $request['booking_phone'],
    //         'booking_slug' => $slug,
    //         'booking_status' => 1,
    //         'created_at' => Carbon::now()->toDateTimeString()
    //     ]);

    //         if($insert){
    //             Session::flash('success','successfully insert resort');
    //             return redirect()->back()->with('success','Successfully Booked.');
    //         }else{
    //             Session::flash('error','Opps! Failed to insert.');
    //             return redirect()->back();
    //         }
    //     }


        public function store(Request $request){
            $booked = Booking::where('booking_status',1)->where('booking_id', $request->booking_id)->first();

            if($booked){
                if($booked->booking_end_date > date('Y-m-d', strtotime(Carbon::now()))){
                    $slug = uniqid();
                    $insert = Booking::insertGetId([
                        'resort_id' => $request->resort_id,
                        'booking_start_date' => $request['booking_start_date'],
                        'booking_end_date' => $request['booking_end_date'],
                        'booking_phone' => $request['booking_phone'],
                        'booking_slug' => $slug,
                        'booking_status' => 1,
                        'created_at' => Carbon::now()->toDateTimeString()
                    ]);
                    return redirect()->back()->with('success', 'applied successfully.', compact('insert'));
                }else{
                    return 'already booking.';
                }
            }else{
                return "Try Next Time. It's already booked.";
            }
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
