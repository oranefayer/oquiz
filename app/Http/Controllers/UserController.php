<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Log;

class UserController extends BaseController
{
    public function signupGet () {
        return view('signup', [
            'name' => 'Signup',                       
        ]);

    }

    public function signupPost () {
        return view('signup', [
            'name' => 'Signup',                       
        ]);
        
    }

    public function signinGet () {
        return view('signin', [
            'name' => 'Signin',                       
        ]);
        
    }

    public function signinPost () {
        return view('signin', [
            'name' => 'Signin',                       
        ]);
        
    }

    public function logout () {
        // deco
        header('Location: '.route('home').'');
        
    }

    public function profile () {
        
    }
}