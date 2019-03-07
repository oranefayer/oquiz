<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_users';
        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function authors()
    {
        return $this->hasMany('App\Quiz', 'id_author');
    }
}