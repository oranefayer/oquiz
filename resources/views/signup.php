<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

<form method="post" action="">
	<fieldset>
		<legend>S'inscrire</legend>

<?php if (!empty($errorList)) : ?>
	<?php foreach ($errorList as $currentError) : ?>
		<div class="error"></div>
		<?= $currentError ?>
		</div>
	<?php endforeach ; ?>
<?php endif ; ?>
		
		<label for="firstname">Prénom :</label><input name="firstname" type="text" id="loggin--field" required/>
		<label for="lastname">Nom :</label><input name="lastname" type="text" id="loggin--field" required/>		
		<label for="birthdate">Date de Naissance :</label><input type="date" id="birthdate" name="birthdate" required/>
		<label for="email">E-mail:</label><input name="email" type="text" id="loggin--field" value="<?= !empty($email) ? $email : '' ; ?>"required/>
		<label for="password">Mot de Passe :</label><input type="password" name="password" id="password-field" required/>
		<label for="password-confirm">Confirmation du Mot de Passe :</label><input type="password" name="password-confirm" id="password-confirm-field" required/>		
	</fieldset>
	
	<button type="submit">GO!</button>
	
</form>
	<button>	
		<a href="<?= route('signinGet') ?>">Retour au formulaire de connexion</a>		
	</button>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>