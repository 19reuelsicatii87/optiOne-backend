<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailAutoController extends Controller
{
    function sendHTMLEmail()
    {

        $data = array(
            'id' => 1,
            'email' => 'reuel@axadra.com',
            'name' => "Virat Gandhi",
            'address' =>
            [
                'street' => "Virat Gandhi",
                'building' => "Virat Gandhi"
            ]
        );

        Mail::send(
            "initialEmail",
            $data,
            function ($message) {
                $message
                    ->to('reuel@axadra.com', 'Tutorials Point')
                    ->subject('subject')
                    ->from('no-reply@gmail.com', '19reuelsicatii87@gmail.com');
            }
        );

        return 'HTML Email Sent. Check your inbox';
    }
}
