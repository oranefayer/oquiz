<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

class Controller extends BaseController
{
    /**
     * Constructeur de la classe parent de tous les Controllers
     */
    public function __construct() {
        view()->share('connectedUser', UserSession::getUser());
        view()->share('connectedUserIsAdmin', UserSession::isAdmin());

    }
}