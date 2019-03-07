<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <!-- Reset CSS -->
        <link href="<?= route('home') ?>/css/reset.css"  rel="stylesheet">

        <!-- FUTUR beautiful CSS -->
        <link href="<?= route('home') ?>/css/style.css"  rel="stylesheet">

        <title>O'Quiz</title>
    </head>
    <body>
        <main class="container">

            <nav>

                    <ul>
                        <li>
                            <a href="<?= route('signinPost') ?>">
                            <h1 >Home</h1>
                            </a>
                        </li>
                    </ul>
    
                    <ul>
                        <li>
<?php if ($connected == false) : ?>
                            <a href="<?= route('signinPost') ?>">
                                <i></i>
                                Se connecter
                            </a>

<?php else : ?>
                            <a href="<?= route('logout') ?>">
                                <i></i>
                                Se déconnecter
                            </a>
                        </li>
<?php endif ; ?>   
                        <li>
                            <a href="<?= route('profile') ?>">
                                <i></i>
                                Mon compte
                            </a>
                        </li>
    
                        <li>
                            <a href="<?= route('logout') ?>">
                                <i></i>
                                Déconnexion
                            </a>
                        </li>
                    </ul>
            </nav>