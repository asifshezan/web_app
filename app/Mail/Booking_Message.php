<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Booking_Message extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message = "";

    public function __construct($resort_booking)
    {
    $this->message = $resort_booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $book_mess = $this->message;


        return $this->subject('Resort Booking Confirmation.')->view('emails.email', compact('book_mess'));
    }
}
