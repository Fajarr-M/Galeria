<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Auth;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user()->name;
        return $this->markdown('email.email')
            ->from('sjuga321@gmail.com')
            ->cc('sjuga321@gmail.com')
            ->subject('Galeria Info')
            ->with([
             'name' => $user,
                ]);
    }
}
