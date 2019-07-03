<?php
	session_start();
	//Comprobamos que el usuario esté logueado, si no lo está le enviamos al la pagina de login
	//Si lo está comprobamos si es admin y actuamos en consecuencia
	if(isset($_SESSION["usuario"])) {
		if($_SESSION["admin"] != 1) {
			echo "<h1>Acceso restringido.</h1>";
			die();
		}
	} else {
		header('location: index.php');
	}	
?>