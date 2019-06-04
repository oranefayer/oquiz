<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';
        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function answers()
    {
        return $this->hasMany('App\Answer', 'id_question');
    }

    public function level()
    {
        return $this->belongsTo('App\Level', 'id_level');
    }

}