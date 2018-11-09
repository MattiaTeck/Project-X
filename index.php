<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Dovresti prima loggare per accedere a questa pagina...";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Benvenuto!</title>
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- informazioni dell'utente --->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Benvenuto <strong><?php echo $_SESSION['username']; ?></strong></p><br>
            <p>Grazie per essere entrato. Per ora non posso pubblicare nulla in questa sezione, ma nel frattempo posso
            regalarti sta foto abbastanza creepy di Andrea Aiello.</p><a href="source/andre5.jpg" download>Foto parecchio turbante</a>
			<p> <a href="index.php?logout='1'" style="color: red;">Esci</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>