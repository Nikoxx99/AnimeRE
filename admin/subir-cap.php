<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	include 'adminProtect.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php 
	include '../header.php';
	?>
	<head>
		<script src="jquery.js"></script>
		<script src="datos.js"></script>
	</head>
<body>
	<?php 
	include '../navbar-ver.php';
	?><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<h3 class="breadcrumb">Subir un Capitulo</h3>
					<div class="form-group">
						<form method="post" action="../form/up-cap.php" class="subida" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nombre del capitulo (EJ: Naruto 1 sub esp) (Nombre + #cap + sub esp">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="nCap" placeholder="Numero del episodio (Ejemplo: 1, 5, 24, 12, etc. solo numeros)">
							</div>
							
							<!--Aqui el input del HLS-->
							<b>Opcion 01 (HLS) aqui debes agregar el .m3u8</b><br>
							<input type="file" name="hls" class="mb-2"/><br>
							<!--Aqui las opciones normales con embed -->
							<b>A partir de aqui, los links deben ser iframes</b>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url1" placeholder="Escriba url del Fembed"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url2" placeholder="Escriba url del Video 2"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url3" placeholder="Escriba url del Video 3"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url4" placeholder="Escriba url del Video 4"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url5" placeholder="Escriba url del Video 5"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url6" placeholder="Escriba url del Video 6"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="url7" placeholder="Escriba url del Video 7"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="urld" placeholder="Escriba url de descarga (Mediafire, Mega, Openload, etc)"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="urld2" placeholder="Escriba url de descarga 2 (Mediafire, Mega, Openload, etc)"></textarea>
							</div>
							<div class="form-group">
								<textarea type="text" class="form-control" id="url" name="urld3" placeholder="Escriba url de descarga 3 (Mediafire, Mega, Openload, etc)"></textarea>
							</div>
							<!--Aqui el input de la imagen-->
							<b>Subir imagen del capitulo (La imagen se ajustara de tamaño y peso automaticamente)</b>
							<input type="file" name="imagen" /> 

							<p style="color:#fff;">Esta oculto en la pagina principal?</p>
							<div class="space"><select class="space form-control" type="text" name="oculto">
							<option value="0">No</option>
							<option value="1">Si (No aparecera en la pagina principal)</option></select></div>
							<p style="color:#fff;">Anime al que pertene el capitulo. (Usar las teclas para buscar el anime si no se encuentra rapido)</p>
							<?php 
								include "../bin/core/conexion.php";
								$sql="SELECT * FROM series ORDER BY Id DESC";
								$resultado = $base->prepare($sql);
								$resultado->execute(array());
								echo"<div class='space'><select class='space form-control' name='idrel'><option value='0'>(Selecciona una Serie)</option>";
								while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
									echo"<option value='".$crow['Id']."'>".$crow['StrNombre']."</option>";
								}


							?>
							<br>
							<br>
							<br>
							

							<input type="submit" class="btn btn-success" value="Confirmar y Subir Capitulo">
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4" style="padding-left:50px;">
			<div class="row">
				<div class="jumbotron"><h2>Acceso Rapido: Panel de Administracion<h2></div>
				<a class="btn btn-primary btn-block" href="https://animere.net/admin/subir.php" role="button">Subir un ANIME</a>
				<a class="btn btn-success btn-block" href="https://animere.net/admin/administracion.php" role="button">Volver al menu principal del Panel Admin</a><br><br><br>
				<!--<div style="margin-top:40px;" class="jumbotron">
					<form action="post">
						<input type="text" id="URL">
						<input type="button" value="Scrap" onclick="scrap_datos();">
					</form>

					<div id="resultados">
						
					</div>
				</div>-->
			</div>
		</div>
	</div>

	<div class="container">
				<div class="container-fluid justify-content-center"><div class="d-flex title justify-content-center"><h2>Ultimos Capitulos Agregados (Incluyendo Ocultos)</h2></div></div>
				<div class="row">
					<?php 
						try{
							include '../bin/core/conexion.php';
							include '../bin/bin/funciones.php';
							$sql="SELECT * FROM capitulos ORDER BY capitulos.Id DESC LIMIT 50";
							$resultado = $base->prepare($sql);
							$resultado->execute(array());
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
								if($crow['tipo'] == 0){
									$infoCap = "Capitulo ". $crow['nCap'];
								}else if($crow['tipo'] == 1){
									$infoCap = "Pelicula";
								}else if($crow['tipo'] == 2){
									$infoCap = "OVA";
								}else{
									$infoCap = "ONA";
								}
								echo"
								<div class='dflex p-0 m-1 col-are-3 col-md-3 col-sm-4 are_mobile'>
									<div class='capitulo_are'>
										<i class='far fa-play-circle are_icon_c'></i>
										<a class='post-vp' href='../ver/". url($crow['Id'],$crow['StrNombre'])."'>
											<p style='position:absolute;float:right;' class='mt-2 ml-2 badge badge-pills badge-are'><i class='fas fa-play'></i> ".$infoCap."</p>
											<div class='img-fluid-are-div'><img  class='img-fluid-are lazyload' src='".$crow['StrImagen']."'></div>
											<h5 class='ml-2 title_cap more2'><i class='fas fa-play-circle'></i> ".$crow['StrNombre']."</h5>
										</a>
									</div>
								</div>				
							";
							}
						}catch(Exception $e){
							echo "Error temporal, por favor reporta esto a un Administrador" . $e->getMessage();
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