<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

<form method="post" action="">
	<fieldset>
		<legend>Connexion</legend>
		<p>
		<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="loggin--field" /><br />
		<label for="password">Mot de Passe :</label><input type="password" name="password" id="password-field" />
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