<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoController extends Controller
{
    //
    function sendMail()
    {
        $data = [
            'fullname' => 'Trần Quý',
            'address' => 'Hà Nội',
            'phone' => '0375284572',
            'time' => '05/04/2003',
            'email' => 'quytran52003@gmail.com',
        ];
        Mail::to('quytran52003@gmail.com')->send(new OrderSuccess($data));
    }
}
