<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categorias</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
	<?php 
	include 'navbar.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<div class="breadcrumb"><h3>Categorias</h3></div>
					<?php 
						$a1=$_GET['Nombre'];
						try{
							include"bin/core/conexion.php";
							include"bin/bin/funciones.php";
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A1 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A2 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A3 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A4 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A5 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
							$sql="SELECT series.StrSinopsis,series.StrImagen,series.StrNombre,series.A1,series.A2,series.A3,series.A4,series.A5,series.A6,categorias.Nombre,categorias.Id FROM categorias INNER JOIN series ON  categorias.id=series.A6 WHERE Nombre='".$a1."'";
							$resultado= $base->query($sql);
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div class='post'>
										<a href='serie/".url($crow['Id'],$crow['StrNombre'])."'>
										<div class='title'>
											<h3>".$crow['StrNombre']."</h3>
										</div>
										<div class='thumb'>
											<img class='img-responsive' src='".$crow['StrImagen']."'>
										</div>
										</a>
									</div>";							
							}
						}catch (Exception $e){
							echo"Fallo en la base de datos" . $e->getLine();
						}

					?>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<h5>Todos derechos reservados <span class="nm-footer">Anipelex</span>.</h5>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</body>
</html>