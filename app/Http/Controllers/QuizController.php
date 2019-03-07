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
        $quiz = App\Quiz::where('id', $id)->first();
        $author = App\User::where('id', $quiz->id_author)->first();
        $tagsId = App\QuizTag::where('id_quiz', $quiz->id)->get();
        $questions = App\Question::where('id_quiz', $quiz->id)->inRandomOrder()->get();

        $tags = [];
        foreach ($tagsId as $currentTagId) {
            $tags[$currentTagId->id_tag] = App\Tag::where('id', $currentTagId->id_tag)->first();
        }

        
        $difficultyLevels = [];
        foreach ($questions as $currentQuestion) {
            $difficultyLevel = App\Question::find($currentQuestion->id)->level()->first();
            $difficultyLevels[$currentQuestion->id] = $difficultyLevel;
        }

        $answers = [];
        foreach ($questions as $currentQuestion) {
            $answersforQuestion = App\Question::find($currentQuestion->id)->answers()->get();
            $answers[$currentQuestion->id] = $answersforQuestion;
        }
        
        return view('play_quiz', [
            'name' => 'Let\'s play!',
            'quiz' => $quiz,
            'author' => $author,            
            'tags' => $tags,
            'questions' => $questions,
            'levels' => $difficultyLevels,
            'answers' => $answers            
        ]);
    }

    public function quizPost(Request $request, $id) {
        $quiz = App\Quiz::where('id', $id)->first();
        $author = App\User::where('id', $quiz->id_author)->first();
        $tagsId = App\QuizTag::where('id_quiz', $quiz->id)->get();
        $questions = App\Question::where('id_quiz', $quiz->id)->get();

        $tags = [];
        foreach ($tagsId as $currentTagId) {
            $tags[$currentTagId->id_tag] = App\Tag::where('id', $currentTagId->id_tag)->first();
        }

        
        $difficultyLevels = [];
        foreach ($questions as $currentQuestion) {
            $difficultyLevel = App\Question::find($currentQuestion->id)->level()->first();
            $difficultyLevels[$currentQuestion->id] = $difficultyLevel;
        }

        $answers = [];
        foreach ($questions as $currentQuestion) {
            $answersforQuestion = App\Question::find($currentQuestion->id)->answers()->get();
            $answers[$currentQuestion->id] = $answersforQuestion;
        }
        
        return view('play_quiz', [
            'name' => 'Let\'s play!',
            'quiz' => $quiz,
            'author' => $author,            
            'tags' => $tags,
            'questions' => $questions,
            'levels' => $difficultyLevels,
            'answers' => $answers            
        ]);
    }

    public function listByTag($id) {
        $tag = App\Tag::where('id', $id)->first();
        $tagQuiz = App\Quiz_tag::where('id_tag', $id)->get();
        $quizzes = App\Quiz::where('id', $tagQuiz->id_quiz)->get();

        $authors = [];
        foreach ($quizzes as $currentQuiz) {
        $authorOfQuiz = App\User::where('id', $currentQuiz->id_author)->first();
        $authors[$currentQuiz->id] = $authorOfQuiz;

        
        
        return view('quizList', [
            'name' => 'Tous les Quizs',
            'tag' => $tagName,
            'authors' => $authors,
            'quizzes' => $quizListByTag,
        ]);

    }
}