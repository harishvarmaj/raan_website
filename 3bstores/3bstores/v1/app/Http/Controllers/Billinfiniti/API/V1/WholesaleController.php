<?php

namespace App\Http\Controllers\Billinfiniti\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class WholesaleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name="Name: ".$request->name;
        $mobile=$name."\nMobile: ".$request->mobile;
        $email=$mobile."\nEmail: ".$request->email;
        $txt=$email."\nMessage: ".$request->message;

       Mail::raw($txt, function($message) use ($request)
       {
           //Oilkart.Store@gmail.com
           $message->to('Oilkart.Store@gmail.com', 'Oilkart')->subject($request->subject);
       });
       
        return response()->json(['status' => '1', 'data' => 'Mail Sent!']);    

    }
}