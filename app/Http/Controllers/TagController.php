<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Log;

class TagController extends BaseController
{
    public function tag () {
        $tags = App\Tag::all();
        return view('tags', [
            'name' => 'Tous les Thèmes',
            'tags' => $tags,
            'quizzes' => $quizzes
        ]);
    }
}