<?php
	session_start();

	// non si sa mai
	$username = "";
	$cognome    = "";
    $nome   = "";
    $password   = "";
    $num = "";
	$errors = array();
	$_SESSION['success'] = "";

	// DATABASE
	$db = mysqli_connect('localhost', 'angelozeva', '', 'my_angelozeva');

	// REGISTRAZIONE UTENTE
	if (isset($_POST['reg_user'])) {
		$cognome = mysqli_real_escape_string($db, $_POST['cognome']);
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


		if (empty($cognome)) { array_push($errors, "Mi serve il tuo cognome"); }
		if (empty($nome)) { array_push($errors, "Mi serve il tuo nome"); }
        if (empty($username)) { array_push($errors, "Mi serve l'username"); }
		if (empty($password_1)) { array_push($errors, "Mi serve la password"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Le due password non coincidono");
		}


		if (count($errors) == 0) {

      $query = "SELECT username FROM Login WHERE username = '$username'";
			$risultato = mysql_query($query, $db);
			$num = mysql_num_rows ($risultato);

			if($num == NULL){
			$password = md5($password_1);
			$query = "INSERT INTO Login (cognome, nome, username, password, ruolo)
					  VALUES('$cognome', '$nome', '$username', '$password', 0)";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Sei stato loggato!";
			header('location: index.php');
			}else{
			array_push($errors, "Username già utilizzato");
			}

		}

	}

	// ...

	// LOGIN
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Mi serve l'username");
		}
		if (empty($password)) {
			array_push($errors, "Mi serve la password");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM Login WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Sei stato loggato!";
				header('location: index.php');
			}else {
				array_push($errors, "Username e/o password non corretti");
			}
		}
	}

?>
