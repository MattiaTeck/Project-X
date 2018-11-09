<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrazione</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>Registrati</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Cognome</label>
			<input type="text" name="cognome" value="<?php echo $cognome; ?>">
		</div>
        <div class="input-group">
			<label>Nome</label>
			<input type="text" name="nome" value="<?php echo $nome; ?>">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Conferma Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Registrati</button>
		</div>
		<p>
			Sei già un membro? Tu si ca si apposto. <a href="login.php">Trasi ca mbaruzzo</a>
		</p>
	</form>
</body>
</html>