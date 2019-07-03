<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	$cat = $_POST['categoria'];
	try{
		include '../bin/core/conexion.php';
		$sql = "INSERT INTO categorias (Nombre) VALUES (:Nombre)";
		$resultado = $base->prepare($sql);
		$resultado->execute(array(":Nombre"=>$cat));
		$resultado->closeCursor();
		header('location: ../admin/add_category.php');
	}catch(Exception $e){
		echo "Fallo en la base datos" . $e->getMessage();
	}
?>