<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{

    function register(Request $req)
    {

        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->is_emailconfirmed = '0';
        $user->save();

        $this->htmlEmail($user);

        return $user;
    }

    function login(Request $req)
    {

        $user = User::where('emailAddress', $req->emailAddress)
        ->where('password', $req->password)
        ->first();

        // Return Error if Empty
        // ===============================
        if (!$user) {
            return ["Error" => "Email or Password is not match!"];
        }

         return $user;
    }
}
