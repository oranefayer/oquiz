<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>


    <section class="account-infos">
        <main>
            <div>
                <img class="profile-picture" src="<?= route('home').'/pictures/'.$connectedUser->role ?>" alt="mon image de profil"/>
                <i class="fas fa-pen"></i>
            </div>
            </h3><?= $connectedUser->first_name ?></h3>
        
        <?php $role = $connectedUser->role == 1 ? 'admin' : 'membre'; ?>
            <h5><?= $role ?></h5>
        </main>
        <div>
            <a href="<?= route('logout') ?>"><button value="Se deconnecter"></button></a>
        </div>


        <div>
            <a href="<?= route('logout') ?>"><button value="Se deconnecter"></button></a>
        </div>
    </section>


<?php require_once __DIR__.'/layout/footer.tpl.php' ; ?>