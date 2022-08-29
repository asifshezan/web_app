<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class WebsiteController extends Controller
{
    public function home(){
        return view('website.home');
    }

    public function booking_form(Request $request){
        $booked = Booking::where('booking_status',1)->orderBy('booking_id','ASC')->first();


            if($booked->booking_end_date === date('Y-m-d', strtotime(Carbon::now()))){
                $slug = uniqid();
                $insert= Booking::insertGetId([
                    'resort_id' => $request['resort_id'],
                    'booking_start_date' => $request['booking_start_date'],
                    'booking_end_date' => $request['booking_end_date'],
                    'booking_phone' => $request['booking_phone'],
                    'booking_slug' => $slug,
                    'booking_status' => 1,
                    'created_at' => Carbon::now()->toDateTimeString()
                ]);
                return redirect()->back()->with('success', 'Resort Booking Successfull.', compact('insert'));
            }else{
                return redirect()->back()->with('error','This Resort Already Booked');
            }

    }



}
