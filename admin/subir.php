<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	include 'adminProtect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Anime</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<style>
			.morecontent span {
			    display: none;
			}
			.morelink {
			    display: block;
			}
	</style>
</head>
<body>
	<?php 
	include '../navbar-ver.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<h3 class="breadcrumb">Agregar Anime</h3>
					<div class="form-group">
						<form method="post" action="../form/up.php" class="subida" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Anime">
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="Sinopsis"></textarea>
							</div>
							<b>Subir imagen de portada</b><br>
							<input type="file" name="imagen" /> <br>
							<b>Subir imagen de fondo</b><br>
							<input type="file" name="imagen-fondo" /> 
							<div class="form-group"><p style="color:#fff;">Fecha de estreno</p>
								<input class="form-control" type="date" name="fecha-estreno" placeholder="Fecha de estreno">
							</div>
							<div class="space"><select class="space form-control" type="text" name="estado1">
							<option value="Finalizado">Finalizado</option>
							<option value="En Emision">En Emision</option></select></div>
							<p style="color:#fff;">Dia de Emision</p>
							<div class="space">
								<select class="space form-control" type="text" name="DiaEmision">
									<option value="0">(Elije Uno)</option>
									<option value="1">Sabado</option>
									<option value="2">Domingo</option>
									<option value="3">Lunes</option>
									<option value="4">Martes</option>
									<option value="5">Miercoles</option>
									<option value="6">Jueves</option>
									<option value="7">Viernes</option>
								</select>
							</div>
							<p style="color:#fff;">Tipo (Serie, Pelicula, OVA, ONA)</p>
							<div class="space">
								<select class="space form-control" type="text" name="tipo">
									<option value="0">Serie</option>
									<option value="1">Pelicula</option>
									<option value="2">OVA</option>
									<option value="3">ONA</option>
								</select>
							</div>
							<p style="color:#fff;">Agregar Anime al Slider?</p>
							<div class="space">
								<select class="space form-control" type="text" name="enSlider">
									<option value="0">No (Por Defecto)</option>
									<option value="1">Si</option>
								</select>
							</div>
							<div class="divisor"></div>
							<div class="breadcrumb"><h6>Categorias (No dejar ninguna en "Default")</h6></div>
								<?php 
									try{
										include"../bin/core/conexion.php";
										$sql="SELECT * FROM categorias";
										$resultado = $base->prepare($sql);
										$resultado->execute(array());
										echo"<div class='space'><select class='space form-control' type='text' name='gnero1'><option value='0'>Default</option>";
										while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow['Nombre']."'>".$crow['Nombre']."</option>";
										}
										$sql="SELECT * FROM categorias";
										$resultado = $base->prepare($sql);
										$resultado->execute(array());
										echo"</select></div>";
										echo"<div class='space'><select class='space form-control' type='text' name='gnero2'><option value='0'>Default</option>";
										while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow['Nombre']."'>".$crow['Nombre']."</option>";
										}
										$sql="SELECT * FROM categorias";
										$resultado = $base->prepare($sql);
										$resultado->execute(array());
										echo"</select></div>";
										echo"<div class='space'><select class='space form-control' type='text' name='gnero3'><option value='0'>Default</option>";
										while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow['Nombre']."'>".$crow['Nombre']."</option>";
										}
										echo"</select></div>";
										$sql="SELECT * FROM categorias";
										$resultado = $base->prepare($sql);
										$resultado->execute(array());
										echo"<div class='space'><select class='space form-control' type='text' name='gnero4'><option value='0'>Default</option>";
										while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow['Nombre']."'>".$crow['Nombre']."</option>";
										}
										echo"</select></div>";
										$sql="SELECT * FROM categorias";
										$resultado = $base->prepare($sql);
										$resultado->execute(array());
										echo"<div class='space'><select class='space form-control' type='text' name='gnero5'><option value='0'>Default</option>";
										while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow['Nombre']."'>".$crow['Nombre']."</option>";
										}
										echo"</select></div>";
									}catch (Exception $e){
										echo"Fallo en la base de datos ". $e->getLine();
									}
								?>
								<br>
							<input type="submit" class="btn btn-success" value="Confirmar y Subir">
						</form>
						<br><br>
						
					</div>
				</div>
			</div>
			<div class="col-md-4 p-4">
			<div class="row">
				<div class="jumbotron"><h2>Acceso Rapido: Panel de Administracion<h2></div>
				<a class="btn btn-primary btn-block" href="https://animere.net/admin/subir-cap.php" role="button">Subir Capitulos (No necesariamente de este mismo anime)</a>
				<a class="btn btn-danger btn-block" href="https://animere.net/admin/add_category.php" role="button">Agregar Categorias (SOLO SI HACE FALTA)</a>
				<a class="btn btn-success btn-block" href="https://animere.net/admin/administracion.php" role="button">Volver al menu principal del Panel Admin</a>
			</div>
		</div>
		</div>
	</div>
	<div class="container">
	<div class="container-fluid justify-content-center"><div class="d-flex title justify-content-center"><h2>Ultimos Animes Agregados</h2></div></div>
				<div class="anime-grid row justify-content-sm-center">
				
				
			<?php
				include "../bin/core/conexion.php";
				include "../bin/bin/funciones.php";

				$sql="SELECT * FROM series ORDER BY Id DESC LIMIT 35";
				$resultado = $base->query($sql);
				while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
					echo'
					<div class="col-are-3 anime-card m-1">
								<div class="card">
									<a href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'">
										<p style="position:absolute;float:right;" class="mt-2 ml-2 badge badge-pills badge-are">'.$tipoA.'</p>
										<p class="a_description more">'.$crow['StrSinopsis'].'</p>
										<div class="div_img_s"><img src="../'. $crow['StrImagen'] .'" class="card-img-top rounded-0 lazy-are" alt="..."></div>
										<div class="are_info_s">
											<h5 class="are_s_title">' . $crow['StrNombre'] . '</h5>
											<p class="badge badge-pills badge-are text-light mb-0">Estreno: '. $crow['StrFechaEstreno'] .'</p>
											<p class="badge badge-pills badge-are text-light mb-0">'.$crow['estado1'].'</p>
										</div>
									</a>
								</div>
							</div>
					';
				}
			?>
			

		</div>
					</div>
	<footer class="footer">
		<div class="container">
			<h5>Todos derechos reservados <span class="nm-footer">AnimeRE</span>.</h5>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</body>
</html>