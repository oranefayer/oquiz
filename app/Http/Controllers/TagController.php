<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as BaseController;
use Log;

class TagController extends BaseController
{
    public function tag () {
        $tags = Tag::all();
        return view('tags', [
            'name' => 'Tous les Thèmes',
            'tags' => $tags,
            'quizzes' => $quizzes
        ]);
    }
}