<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class InformationController extends Controller
{
    public function about()
    {
        return view('information.about');
    }

    public function faq()
    {
        return view('information.faq');
    }
    
    public function legal()
    {
        return view('information.legal');
    }

    public function contact()
    {
        return view('information.contact');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::send('emails.contact-message',[
            'msg' => $request->message,
            'email' =>$request->email
        ],function($mail) use($request){
            $mail->from($request->email);
            $mail->to('av.contactus@gmail.com')->subject('Contact');
        });
        
        return redirect()->back()->with('flash_message','Message envoyé.');

    }
}
