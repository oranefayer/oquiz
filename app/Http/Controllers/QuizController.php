<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Log;

class QuizController extends BaseController
{
    public function quizGet($id) {

        $authors = App\App_user::all();
        $quiz = App\Quiz::where('id', '=', $id)->get();
        $questions = DB::table('questions')->join('answers', 'questions.id', '=', 'answers.id_question')->get();
    //    $authorId = $quiz->author_id;
   //     $author = App\App_user::where('id', $authorId)->get();
      //  $questions = App\Question::where('id_quiz', '=', $id)->get();
        return view('play_quiz', [
            'name' => 'Let\'s play!',
            'authors' => $authors,
            'quiz' => $quiz,
            'questions' => $questions,

        ]);
    }

    public function quizPost(Request $request, $id) {
        $quiz = App\Quiz::where('id', $id)->get();

        $questions = App\Question::where('id', $quiz->id)->get();
     //   $author = App\App_user::where('id', $quiz->id_author)->get();
        $questions = App\Question::where('id', $quiz->id)->get();
        return view('play_quiz', [
            'name' => 'home',
            'author' => $author,
            'quiz' => $quiz,
            'questions' => $questions
            ]);
    }

    public function listByTag($id) {

        $tags = App\Quiz_tag::where('tag_id', $id)->get();
        $tagName = App\Tag::where('id', $id)->get();

        $quizListByTag = [];
        foreach ($tags as $currentLine){
            $currentQuiz = App\Quiz::where('tag_id', $currentLine->quiz_id)->get();
            $quizListByTag = ['currentQuiz' => $currentQuiz];
        }
        
        return view('quizList', [
            'name' => 'Tous les Quizs',
            'tag' => $tagName,
            'authors' => $authors,
            'quizzes' => $quizListByTag,
        ]);

    }
}