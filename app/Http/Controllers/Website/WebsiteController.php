<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Resort;
use App\Mail\Booking_Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function home(){
        return view('website.home');
    }


    public function booking_form(Request $request){

        $bookings = Booking::all();
        if (count($bookings) > 0) {
            foreach($bookings as $book){
                // Current Date
                $current = date('Y-m-d', strtotime(Carbon::now()));
                // Request Date
                $checkin = date('Y-m-d', strtotime($request->booking_start_date));
                $checkout = date('Y-m-d', strtotime($request->booking_end_date));
                // Already Booking Date
                $startDate = date('Y-m-d', strtotime($book->booking_start_date));
                $endDate = date('Y-m-d', strtotime($book->booking_end_date));

                if (($checkin >= $checkout) && ($checkout <= $checkin)){
                    return redirect()->route('website.home')->with('error', 'Invalid Date.');
                }
                if($book->resort_id == $request->resort_id) {
                    if( ($checkin == $startDate) || ($checkout == $endDate)){
                        return redirect()->route('website.home')->with('error', 'Resort Already Booked.');
                    }
                }else{
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

                    Mail::to($request->booking_email)->send(new Booking_Message($request->booking_start_date));
            Mail::to('asifshezan7@gamil.com')->send(new Booking_Message($request->booking_start_date));

                    return redirect()->route('website.home')->with('success', 'Resort Booking Successfull.');
                }
            }
        }else{
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

            Mail::to($request->booking_email)->send(new Booking_Message($request->booking_start_date));
            Mail::to('asifshezan7@gamil.com')->send(new Booking_Message($request->booking_start_date));

            return redirect()->route('website.home')->with('success', 'Resort Booking Successfull.');

        }


    }

}
























        // $bookings = Booking::all();
        // foreach($bookings as $book){
        //     // return $book->resort_id;
        //     return $request->resort_id;
        //     if($book->resort_id == $request->resort_id) {
        //         echo "no";
        //         echo "</br>";

        //         if ($book->booking_start_date >= date('Y-m-d', strtotime($request->booking_start_date && $book->booking_end_date <= date('Y-m-d', strtotime($request->booking_end_date))))) {
        //             return redirect()->route('website.home')->with('error', 'Resort Already Booked.');
        //         }
        //     }else{
        //         echo "yes";
        //         echo "</br>";
        //         $slug = uniqid();
        //         Booking::insertGetId([
        //             'resort_id' => $request['resort_id'],
        //             'booking_start_date' =>  date('Y-m-d', strtotime($request->booking_start_date)),
        //             'booking_end_date' =>  date('Y-m-d', strtotime($request->booking_end_date)),
        //             'booking_phone' => $request['booking_phone'],
        //             'booking_email' => $request['booking_email'],
        //             'booking_slug' => $slug,
        //             'booking_status' => 1,
        //             'created_at' => Carbon::now()->toDateTimeString()
        //         ]);
        //         return redirect()->route('website.home')->with('success', 'Resort Booking Successfull.');
        //     }
        // }
