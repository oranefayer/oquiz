<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

<form method="post" action="">
	<fieldset>
		<legend>Connexion</legend>
		<p>
		<label for="pseudo">Nom :</label><input name="pseudo" type="text" id="loggin--field" required/>
		<label for="pseudo">Prénom :</label><input name="pseudo" type="text" id="loggin--field" required/>
		<label for="birthdate">Date de Naissance :</label><input type="date" id="birthdate" name="birthdate" required/>
		<label for="pseudo">E-mail:</label><input name="pseudo" type="text" id="loggin--field" required/>
		<label for="password">Mot de Passe :</label><input type="password" name="password" id="password-field" required/>
		<label for="password">Confirmation du Mot de Passe :</label><input type="password" name="password" id="password-field" required/>
		</p>
	</fieldset>
	<p>
		<button type="submit">GO!</button>
	</p>
</form>
	<button>	
		<a href="<?= route('signupPost') ?>">Pas encore inscrit ?!</a>		
	</button>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>