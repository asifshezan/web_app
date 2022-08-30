<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Resort;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function home(){
        return view('website.home');
    }

    public function booking_form(Request $request){



        if(!empty($request->booking_start_date)) {
            if(Booking::where('booking_start_date',$request->booking_start_date)->firstOrFail()->booking_start_date != $request->booking_start_date){
                if(Booking::where('booking_end_date',$request->booking_end_date)->firstOrFail()->booking_end_date != $request->booking_end_date){
                    $slug = uniqid();
                    Booking::insertGetId([
                        'resort_id' => $request['resort_id'],
                        'booking_start_date' =>  date('Y-m-d', strtotime($request->booking_start_date)),
                        'booking_end_date' =>  date('Y-m-d', strtotime($request->booking_end_date)),
                        'booking_phone' => $request['booking_phone'],
                        'booking_email' => $request['booking_email'],
                        'booking_slug' => $slug,
                        'booking_status' => 1,
                        'created_at' => Carbon::now()->toDateTimeString()
                    ]);
                    return redirect()->route('website.home')->with('success', 'Resort Booking Successfull.');

                }else{
                    echo "last date  error";
                }


            }else{
                echo "first date  error";
            }

            // echo "</br>";

            // if ($book->booking_start_date >= date('Y-m-d', strtotime($request->booking_start_date))) {
            //     return redirect()->route('website.home')->with('error', 'Resort Already Booked.');
            // }
        }else{
            echo "no";
            // echo "yes";
            // echo "</br>";

        }




















        // return $request->all();
        // $bookings = Booking::all();
        // foreach($bookings as $book){
            // // return $book->resort_id;
            // return $request->resort_id;
            // if($book->resort_id == $request->resort_id) {
            //     echo "no";
            //     echo "</br>";

            //     // if ($book->booking_start_date >= date('Y-m-d', strtotime($request->booking_start_date && $book->booking_end_date <= date('Y-m-d', strtotime($request->booking_end_date))))) {
            //     //     return redirect()->route('website.home')->with('error', 'Resort Already Booked.');
            //     // }
            // }else{
            //     echo "yes";
            //     echo "</br>";
            //     // $slug = uniqid();
            //     // Booking::insertGetId([
            //     //     'resort_id' => $request['resort_id'],
            //     //     'booking_start_date' =>  date('Y-m-d', strtotime($request->booking_start_date)),
            //     //     'booking_end_date' =>  date('Y-m-d', strtotime($request->booking_end_date)),
            //     //     'booking_phone' => $request['booking_phone'],
            //     //     'booking_email' => $request['booking_email'],
            //     //     'booking_slug' => $slug,
            //     //     'booking_status' => 1,
            //     //     'created_at' => Carbon::now()->toDateTimeString()
            //     // ]);
            //     // return redirect()->route('website.home')->with('success', 'Resort Booking Successfull.');
            // }
        // }
    }



}



//
