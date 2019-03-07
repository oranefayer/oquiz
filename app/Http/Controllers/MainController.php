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

        $authors = App\User::all();
        $tags = App\Tag::all();
        $quizzes = App\Quiz::all();
        $authors= [];
        foreach ($quizzes as $currentQuiz) {
            $authorOfQuiz = App\Quiz::find($currentQuiz->id)->authors()->first();
            $authors[$currentQuiz->id] = $authorOfQuiz;
        }

        return view('home', [
            'name' => 'home',            
            'tags' => $tags,
            'quizzes' => $quizzes,
            'authors' => $authors,
        ]);
    }

    public function error404() {

    }

    public function legal() {

    }

}