<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Tag;
use App\Quiz;
use App\Question;
use App\QuizTag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as BaseController;
use Log;

class QuizController extends BaseController
{
    public function quizGet($id) {
        $quiz = Quiz::where('id', $id)->first();
        $author = User::where('id', $quiz->id_author)->first();
        $tagsId = QuizTag::where('id_quiz', $quiz->id)->get();
        $questions = Question::where('id_quiz', $quiz->id)->get();

        $tags = [];
        foreach ($tagsId as $currentTagId) {
            $tags[$currentTagId->id_tag] = Tag::where('id', $currentTagId->id_tag)->first();
        }

        
        $difficultyLevels = [];
        foreach ($questions as $currentQuestion) {
            $difficultyLevel = Question::find($currentQuestion->id)->level()->first();
            $difficultyLevels[$currentQuestion->id] = $difficultyLevel;
        }

        $answers = [];
        foreach ($questions as $currentQuestion) {
            $answersforQuestion = Question::find($currentQuestion->id)->answers()->inRandomOrder()->get();
            $answers[$currentQuestion->id] = $answersforQuestion;
        }
        
        return view('play_quiz', [
            'name' => 'Que boire ce soir?',
            'quiz' => $quiz,
            'author' => $author,            
            'tags' => $tags,
            'questions' => $questions,
            'levels' => $difficultyLevels,
            'answers' => $answers            
        ]);
    }

    public function quizPost(Request $request, $id) {
        $userResponses = $request->input();
        $wrongAnswers = [] ;
        $rightAnswers = [];
        foreach ($userResponses as $currentQuestionId => $currentAnswerId) {
            $question = Question::where('id', $currentQuestionId)->first();
            if ($currentAnswerId != $question->id_answer) {
                $wrongAnswers[$currentQuestionId] = $currentAnswerId;
            }
            else {
            $rightAnswers[$currentQuestionId] = $currentAnswerId;
            }
        }
         
        $quiz = Quiz::where('id', $id)->first();
        $author = User::where('id', $quiz->id_author)->first();
        $tagsId = QuizTag::where('id_quiz', $quiz->id)->get();
        $questions = Question::where('id_quiz', $quiz->id)->get();

        $tags = [];
        foreach ($tagsId as $currentTagId) {
            $tags[$currentTagId->id_tag] = Tag::where('id', $currentTagId->id_tag)->first();
        }

        
        $difficultyLevels = [];
        foreach ($questions as $currentQuestion) {
            $difficultyLevel = Question::find($currentQuestion->id)->level()->first();
            $difficultyLevels[$currentQuestion->id] = $difficultyLevel;
        }

        $answers = [];
        foreach ($questions as $currentQuestion) {
            $answersforQuestion = Question::find($currentQuestion->id)->answers()->get();
            $answers[$currentQuestion->id] = $answersforQuestion;
        }
        dump($userResponses);
        return view('quiz_results', [
            'name' => 'Resultats',
            'quiz' => $quiz,
            'author' => $author,            
            'tags' => $tags,
            'questions' => $questions,
            'levels' => $difficultyLevels,
            'answers' => $answers,
            'score' => count($rightAnswers),
            'classAnswer' => '',
            'goodAnswers' => $rightAnswers,
            'badAnswers' => $wrongAnswers   
        ]);
    }

    public function listByTag($id) {
        $tag = Tag::where('id', $id)->first();
        $tagQuiz = QuizTag::where('id_tag', $id)->get();

        $quizListByTag = [];
        foreach ($tagQuiz as $currentTagQuiz) {
            $quizListByTag[]= Quiz::where('id', $currentTagQuiz->id_quiz)->first();
        }

        $authors = [];
        foreach ($quizListByTag as $currentQuiz) {
            $authorOfQuiz = User::where('id', $currentQuiz->id_author)->first();
            $authors[$currentQuiz->id] = $authorOfQuiz;
        }
        
        
        return view('quiz_by_tag', [
            'name' => 'Tous les Quizs',
            'tag' => $tag,
            'authors' => $authors,
            'quizzes' => $quizListByTag,
        ]);

    }
}