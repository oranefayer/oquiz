<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizTag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quizs_tags';
        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}