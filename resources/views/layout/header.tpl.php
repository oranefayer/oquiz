<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <!-- Reset CSS -->
        <link href="<?= route('home') ?>/css/reset.css"  rel="stylesheet">

        <!-- FUTUR beautiful CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Cherry+Cream+Soda|Londrina+Solid:100,300,400,900" rel="stylesheet">
        <link href="<?= route('home') ?>/css/style.css"  rel="stylesheet">

        <title>La Reserve de Fred</title>
    </head>
    <body>
    <header>
        <div class="banner">
    	
    	    <img src="<?= route('home') ?>/pictures/scenery_reserve.gif"/>
    	    <img src="<?= route('home') ?>/pictures/panneau_reserve.gif"/>
    
    	    <aside class="user-nav">
<?php  if ($connectedUser != false) : ?>
                <div>
                    <a href="<?= route('profile') ?>">
                    <div>
                        <img class="profile-picture" src="<?= route('home').'/pictures/'.$connectedUser->role ?>" alt="mon image de profil"/>
                            <i class="fas fa-pen"></i>
                    </div>
                    </a>
                </div>                    
            
                <div>
                    <a href="<?= route('logout') ?>">
                        <i></i>
                        Se déconnecter
                    </a>
                </div>
<?php  else : ?>                      
                <div>
                    <i class="fas fa-user-secret fa-5x"></i>                   
                </div>            
                <div>
                    <a href="<?= route('signinGet') ?>">
                        Se connecter
                    </a>
                </div>                        
<?php  endif ; ?>
    	    </aside>
        </div>

        <nav>
            <i class="fas fa-ellipsis-v"></i>
                <ul class="dropdown-menu hidden">
                    <li>
                        <a href="<?= route('home') ?>">
                        <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= route('quizGet', ['id' => 2]) ?>">                   
                        <div>
                            <i class="fas fa-tint"></i>
                            <i class="fas fa-question"></i>
                        </div>
                            Que boire ce soir?
                        </a>
                    </li>

                    <li>
                        <a href="<?= route('home') ?>">
                        <i class="far fa-clock"></i>
                            Les Horaires
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('home') ?>">
                        <i class="fas fa-info"></i>
                            A propos de nous
                        </a>
                    </li>
                </ul>
            </i>
        </nav>
    </header>
    <main class="global-wrapper">

        <h2><?= $name ?></h2>
    