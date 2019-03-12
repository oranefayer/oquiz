<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Tag;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as BaseController;
use Log;

class MainController extends BaseController
{

    public function home(Request $request) {

        $authors = User::all();
        $tags = Tag::all();
        $quizzes = Quiz::all();
        $authors= [];
        foreach ($quizzes as $currentQuiz) {
            $authorOfQuiz = Quiz::find($currentQuiz->id)->authors()->first();
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