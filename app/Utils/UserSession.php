<?php

namespace App\Utils;

use App\User;

abstract class UserSession
{
    const SESSION_INDEX = 'connectedUser';

    /**
     * Méthode permettant de connecter un utilisateur
     *
     * @param \App\Models\User $user
     */
    public static function connect(User $user)
    {
        // $_SESSION['connectedUser'] = $user;
        $_SESSION['userIP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION[self::SESSION_INDEX] = $user;
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect()
    {
        if (self::isConnected()) {
            unset($_SESSION[self::SESSION_INDEX]);
        }
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à un compte
     *
     * @return bool
     */
    public static function isConnected() : bool
    {
        if (!empty($_SESSION[self::SESSION_INDEX])){
            dump($_SESSION);
            if ($_SESSION['userIP'] == $_SERVER['REMOTE_ADDR']){
            dump($_SESSION[self::SESSION_INDEX].' exists and '.$_SESSION['userIP'].' matchs '.$_SERVER['REMOTE_ADDR']);
            return true;
            }
            else {
                self::disconnect();
                dump($_SESSION['userIP'].' doesnt match '.$_SERVER['REMOTE_ADDR']);
            }
        }
        
        return false;
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     *
     * @return \App\Models\User
     */
    public static function getUser()
    {
        if (self::isConnected()) {
            dump($_SESSION[self::SESSION_INDEX].' IS CONNECTED');
            return $_SESSION[self::SESSION_INDEX];
        }
        
        dump('no user connected');
        return false;
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     *
     * @return bool
     */
    public static function isAdmin() : bool
    {
        $connectedUser = self::getUser();
        if (!empty($connectedUser)) {
            return $connectedUser->role == '1';
        }
        return false;
    }
}