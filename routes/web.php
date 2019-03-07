<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', [
    'as' => 'home',
    'uses' => 'MainController@home'
]);

$router->get('/404/', [
    'as' => 'error404',
    'uses' => 'MainController@error404'
]);

$router->get('/Mention-legales/', [
    'as' => 'legal',
    'uses' => 'MainController@legal'
]);

$router->get('/quiz/{id}', [
    'as' => 'quizGet',
    'uses' => 'QuizController@quizGet'
]);

$router->post('/quiz/{id}', [
    'as' => 'quizPost',
    'uses' => 'QuizController@quizPost'
]);

$router->get('/signup', [
    'as' => 'signupGet',
    'uses' => 'UserController@signupGet'
]);

$router->post('/signup', [
    'as' => 'signupPost',
    'uses' => 'UserController@signupPost'
]);

$router->get('/signin', [
    'as' => 'signinGet',
    'uses' => 'UserController@signinGet'
]);

$router->post('/signin', [
    'as' => 'signinPost',
    'uses' => 'UserController@signinPost'
]);

$router->get('/logout', [
    'as' => 'logout',
    'uses' => 'UserController@logout'
]);

$router->get('/profile', [
    'as' => 'profile',
    'uses' => 'UserController@profile'
]);

$router->get('/tag', [
    'as' => 'tag',
    'uses' => 'TagController@tag'
]);

$router->get('/quiz/tag/{id}', [
    'as' => 'quizzesByTag',
    'uses' => 'QuizController@listByTag'
]);