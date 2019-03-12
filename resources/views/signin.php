<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

<form method="post" action="">
	<fieldset>
		<legend>Connexion</legend>

<?php if (!empty($errorList)) : ?>
	<?php foreach ($errorList as $currentError) : ?>
		'<div class="error"></div>'
		<?= implode('<div class="error"></div>', $errorList) ?>
		</div>
	<?php endforeach ; ?>
<?php endif ; ?>
		
		<label for="email">E-mail:</label><input name="email" type="text" id="loggin--field" /><br />
		<label for="password">Mot de Passe :</label><input name="password"  type="password" id="password-field" />
	</fieldset>	
	<button type="submit">GO!</button>	
</form>
	<button>	
		<a href="<?= route('signupGet') ?>">Pas encore inscrit ?!</a>		
	</button>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>