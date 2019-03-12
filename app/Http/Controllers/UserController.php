<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Utils\UserSession;
use App\Http\Controllers\Controller as BaseController;
use Log;

class UserController extends BaseController
{
    public function signupGet () {
        return view('signup', [
            'name' => 'Signup',                       
        ]);
    }

    public function signupPost (Request $request) {

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $birthdate = $request->input('birthdate');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password-confirm');

        $errorList = [];
        if (empty($firstname)) {
            $errorList[] = 'Veuillez renseigner votre prénom';
        }
        else if (strlen($firstname) < 3) {
            $errorList[] = 'Le prénom doit être composé d\'au moins deux caractères';
        }        
        if (empty($lastname)) {
            $errorList[] = 'Veuillez renseigner votre nom';
        }
        else if (strlen($lastname) < 3) {
            $errorList[] = 'Le nom doit être composé d\'au moins deux caractères';
        }
        if (empty($email)) {
            $errorList[] = 'Veuillez saisir l\'email';
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorList[] = 'L\'adresse email est invalide';
        }
        if (empty($password)) {
            $errorList[] = 'Veuillez saisir le mot de passe';
        }
        else if (strlen($password) < 8) {
            $errorList[] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
        if (empty($passwordConfirm)) {
            $errorList[] = 'Veuillez saisir la confirmation du mot de passe';
        }
        if (!empty($password) && !empty($passwordConfirm) && $password != $passwordConfirm) {
            $errorList[] = 'Les 2 mots de passe sont différents';
        }

        if (count($errorList) == 0) {

            $existingUser = User::where('email', $email)->first();

            if (empty($existingUser)) {
                $newUserModel = new User();
                $newUserModel->email = $email;
                $newUserModel->password = password_hash($password, PASSWORD_DEFAULT);
                $newUserModel->role = '2';
                $newUserModel->first_name = $firstname;
                $newUserModel->last_name = $lastname;
                $newUserModel->save();
                UserSession::connect($newUserModel);
                return redirect()->route('profile');
            }

            else {
                $errorList[] = 'Un compte existe déjà pour cette adresse email';
                return view('signup', [
                    'errorList' => $errorList,
                    'email' => $email
                ]);
            }
        }

        else {
            return view('signup', [
                'name' => 'Signup', 
                'errorList' => $errorList,
                'email' => $email
            ]);
        }
    }

    public function signinGet () {
        return view('signin', [
            'name' => 'Signin',                       
        ]);        
    }

    public function signinPost (Request $request) {
        $email = $request->input('email', '');
        $password = $request->input('password', '');

        $errorList = [];
        if (empty($email)) {
            $errorList[] = 'Veuillez saisir l\'email';
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorList[] = 'L\'adresse email est invalide';
        }
        if (empty($password)) {
            $errorList[] = 'Veuillez saisir le mot de passe';
        }

        if (count($errorList) == 0) {
            $userModel = User::where('email', $email)->first();

            if (!empty($userModel)) {
                if (password_verify($password, $userModel->password)) {
                    UserSession::connect($userModel);
                    return redirect()->route('home');
                }                
            }

            else if (empty($userModel) || password_verify($password, $userModel->password == false)) {
                $errorList[] = 'Les identifiants saisis sont érronés';
            }
        }
        return view('signin', [
            'errorList' => $errorList
        ]);
        
    }

    public function logout () {
        UserSession::disconnect();
        header('Location: '.route('home').'');
        
    }

    public function profile () {
        return view('profile', [
            'name' => 'Profil',
        ]);
        
        
    }
}