<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;
use App\Mail\ContactMe;
use App\Models\User;
use Auth;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function send(){
        request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))->send(new ContactMe());

        return redirect()->back()->with('respon','Email Berhasil Dikirim');
    }
}
