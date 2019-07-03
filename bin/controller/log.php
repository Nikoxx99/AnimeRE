<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	try {
		include '../core/conexion.php';
		include '../bin/funciones.php';

		$count = 0;
		//consulta a la base datos
		$sql = "SELECT * FROM usuarios WHERE Email = :email";
		$email = htmlentities(addslashes($_POST['email']));
		$password = htmlentities(addslashes($_POST['password']));
		$resultado = $base->prepare($sql);						//Preparo la consulta
		$resultado->bindValue(':email', $email); 
		$resultado->execute();
		$data = $resultado->fetch(PDO::FETCH_ASSOC);
		$count = $resultado->rowCount();	
		//Si la contraseña era correcta inicia sesion
		if ($count!=0 && saltPepper($password, $data['passSalt'], $pepper) == $data['passHash']) { 
			ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
			session_start();									//llamo funcion crear sesion
			$_SESSION["usuario"] = $data['Nombre'];				//le doy nombre al usuario de la sesion
			$_SESSION["idUser"] = $data['Id'];					//guardo el id del usuario en la base de datos
			$_SESSION["admin"] = $data['admin'];				//Establece si el usuario es administrador o no
			header('location: ../../admin/administracion.php');				//Redirecciono al index del panel si existe registro
		}else{			
			header('location: ../../login.php');				//Redirecciono a la misma pagina sino existe el registro
		}
		$resultado->closeCursor();
	} catch (Exception $e) {
		echo "linea" . $e->getLine();
	}
?>