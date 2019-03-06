<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Log;

class MainController extends BaseController
{
    public function home(Request $request) {

        $authors = App\App_user::all();
        $tags = App\Tag::all();
        $quizzes = App\Quiz::all();

        return view('home', [
            'name' => 'home',
            'authors' => $authors,
            'tags' => $tags,
            'quizzes' => $quizzes
        ]);
    }

    public function error404() {

    }

    public function legal() {

    }

}