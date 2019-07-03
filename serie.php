<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<!DOCTYPE html>
<?php
	session_start();
					$id = $_GET['Id'];					
					$nombre = $_GET['StrNombre'];

						include "bin/bin/funciones.php";
						include "bin/core/conexion.php";
						$sql = "SELECT * FROM series WHERE Id='".$id."'";
						$resultado= $base->prepare($sql);
						$resultado->execute(array());
						$crow=$resultado->fetch(PDO::FETCH_ASSOC);
						$url1 = str_replace('../../','https://animere.net/',$crow['StrImagenFondo']);
						
						
					?>
					
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php titulo($_GET['StrNombre']);?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta property="fb:app_id" content="1929989280461762" />
	<meta property="og:title" content="<?php titulo($_GET['StrNombre']);?>">
	<meta property="og:image" content="<?php echo $url1; ?>">
	<meta property="og:description" content="<?php echo $crow['StrSinopsis'];?>">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta content="AnimeRE <?php titulo($_GET['StrNombre'])?> online gratis en hd, ver <?php titulo($_GET['StrNombre'])?> gratis online en AnimeRE" name="description"/>
	<meta content="<?php titulo($_GET['StrNombre'])?> online gratis en hd, ver <?php titulo($_GET['StrNombre'])?> gratis online" name="keywords"/>
	<meta content="all, index, follow" name="robots"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="shourtcut icon" type="image/x-icon" href="https://animere.net/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="https://animere.net/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-cap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<style>.modal-content {background-color: #222 !important;}
</style>
</head>
<body>

<?php
                if(!isset($_SESSION["usuario"])) {
                    echo '';
                } else {
                    echo '

						<div class="d-flex justify-content-center p-3" style="background-color:#b39c2c;">
						<a href="https://animere.net/admin/administracion.php" class="nav-link btn btn-success">'.$_SESSION["usuario"].' Panel Admin</a>
						<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#are-admin">
						Opciones Administrativas
						</button>
						
						</div>

						<!-- Modal -->
						<div class="modal fade" id="are-admin" tabindex="-1" role="dialog" aria-labelledby="are-adminLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="are-adminLabel">Modificar '.$crow['StrNombre'].'</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<ul style="background-color:#111;padding:10px;position:relative;z-index: 100;" class="nav justify-content-center">
								<form method="post" action="../../form/refrescar.php" class="m-2">
									<div class="space">
										<select class="space form-control" type="text" name="estado1">
											<option value="Finalizado">Finalizado</option>
											<option value="En Emision">En Emision</option>
										</select>
									</div>
									<input  type="hidden" name="ids" value ="'.$id.'" readonly>
									<input name="estado" type="submit" class="btn btn-success" value="Actualizar">
	
								</form>
						
						
								<form method="post" action="../../form/img_p.php" enctype="multipart/form-data" class="m-2">
								<div class="box">
									<input type="file" name="imagen" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple/>
									<input  type="hidden" name="id_p" value ="'.$id.'" readonly>
									<input  type="hidden" name="nombre" value ="'.$crow['StrNombre'].'" readonly>
									<input name="imagen_p" type="submit" class="btn btn-success" value="Imagen Portada">
								</div>
									
	
								</form>
						
						
								<form method="post" action="../../form/img_f.php" enctype="multipart/form-data" class="m-2">
									<div class="box">
										<input type="file" name="imagen-fondo" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple/>
										<input  type="hidden" name="id_f" value ="'.$id.'" readonly>
										<input  type="hidden" name="nombre1" value ="'.$crow['StrNombre'].'" readonly>
										<input name="imagen_f" type="submit" class="btn btn-success" value="Imagen Fondo">
									</div>
									
	
								</form>
						
						</ul>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							</div>
							</div>
						</div>
						</div>

                    ' ;
                }
            ?> 
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
<?php include 'navbar-ver.php';?>  
<div class="container-fluid">
	<?php 
				try {
					$id = $_GET['Id'];
					$nombre = $_GET['StrNombre'];
					include 'bin/core/conexion.php';
					$sql = "SELECT * FROM series WHERE Id='".$id."'";
					$resultado = $base->query($sql);
					$resultado->execute(array());
					if ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
							echo"
							<div class='row'>
								<div class='anine-fondo col-lg-12 col-md-12 col-sm-12'>
									<img class='fondo1' style='background-image: url(".$crow['StrImagenFondo'].");'>
								</div>
							</div>
							";}

					}catch(Exception $e){
						echo "Error en linea: " . $e->getMessage();
					}
			?>
</div>
<div  class="container">
			<?php 
				try {
					$id = $_GET['Id'];
					$nombre = $_GET['StrNombre'];
					include 'bin/core/conexion.php';
					$sql = "SELECT * FROM series WHERE Id='".$id."'";
					$resultado = $base->query($sql);
					$resultado->execute(array());
					if ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
						if ($crow['estado1'] == "En Emision") {
							$colorE = "btn btn-block btn-success";
							$titE = "En Emision";
						}else{
							$colorE = "btn btn-block btn-danger";
							$titE = "Finalizado";
						}
						if($crow['tipo'] == 0){
							$tipoA = "Serie";
						}else if($crow['tipo'] == 1){
							$tipoA = "Pelicula";
						}else if($crow['tipo'] == 2){
							$tipoA = "OVA";
						}else{
							$tipoA = "ONA";
						}

						echo"
								<div class='row'>
								<div class='col-lg-3 col-md-3 col-sm-3'>
									<div class='anime_imagen'><img class='are-in mx-auto d-block' src='".$crow['StrImagen']."'></div>
									<div id='estado' class='are-in boton_estado p-2 bd-highlight'><p style='margin-bottom:0.5rem !important; margin:auto;' class='".$colorE."' href='#' disabled>" .$titE. "</p></div>
									<div class='are-in boton_estado p-2 bd-highlight'><p style='margin-bottom:0.5rem !important; margin:auto;' class='btn btn-block btn-warning' disabled>Estreno: ".$crow['StrFechaEstreno']."</p></div>
									<div class='are-in boton_estado p-2 bd-highlight'><p style='margin-bottom:0.5rem !important; margin:auto;' class='btn btn-block btn-warning' disabled>" .$tipoA. "</p></div>
								</div>
								<div class='are-in anime-info col-lg-9 col-md-9 col-sm-9'>
									<div class='container-fluid'>
										<div class='row d-flex titulo_anime'>
											<div style='border-bottom:solid 2px; border-color:#fff;max-width:80%;padding-bottom:15px;' class='col-lg-12'>
												<h1 style='color:#ebcc34;'>".$crow['StrNombre']."</h1>
											</div>
										</div>
										<div class='row d-flex descripcion_anime'>
										<div class='d-flex flex-lg-row flex-md-row flex-sm-row bd-highlight mb-3 info_anime'>
											<div class='p-2 bd-highlight'><a class='are_cat' href='#'>".$crow['A1']."</a></div>
											<div class='p-2 bd-highlight'><a class='are_cat' href='#'>".$crow['A2']."</a></div>
											<div class='p-2 bd-highlight'><a class='are_cat' href='#'>".$crow['A3']."</a></div>
											<div class='p-2 bd-highlight'><a class='are_cat' href='#'>".$crow['A4']."</a></div>
											<div class='p-2 bd-highlight'><a class='are_cat' href='#'>".$crow['A5']."</a></div>
										</div>
											<div class='col-lg-12'>
												<p style='color:#ebcc34; padding-top:15px;'>".$crow['StrSinopsis']."</p>
											</div>
										</div>
										<div class='row'>
											<div class='col-lg-12'>
												<div class='container-fluid'>
														<div class='d-flex flex-lg-row flex-md-row flex-sm-row bd-highlight mb-3 info_anime'>
														  
														  
														</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div
							
							
							
							"
							
						;}

					}catch(Exception $e){
						echo "Error en linea: " . $e->getMessage();
					}
			?>


			 

				
	</div>
	<div class="are-in container-fluid" style="padding-left:0;">
	<div class="panel-heading"><h2 style="padding:3px;border-bottom: 1px solid #dee2e6;color:#ebcc34;"><i class="fas fa-th-list"></i> Lista de Capitulos</h2></div>
		<div class="row">
		<div id="caps_scrollbar" class="col-lg-9 col-md-9 col-sm-12 col-12 tabla_episodios">
			<div class="panel panel-default">
					 
					  <table class="table">
							<tr style="display:flex;flex-direction:column;"  class="td-cap">
								<?php
							try {
								$id = $_GET['Id'];
								$nombre = $_GET['StrNombre'];
								include 'bin/core/conexion.php';

								$sql = "SELECT series.Id,series.StrSinopsis,series.DiaEmision,series.estado1,capitulos.StrNombre,capitulos.IdRel,capitulos.Id FROM series INNER JOIN capitulos ON series.Id = capitulos.IdRel WHERE IdRel = ".$id." ORDER BY capitulos.nCap DESC";
								$resultado = $base->query($sql);
								$crow=$resultado->fetch(PDO::FETCH_ASSOC);
								if ($crow['estado1'] != "En Emision" ){
									echo"";
								}else{
									if($crow['DiaEmision'] == "1"){
										$d = "sabado  ";
										$ds=strtotime("next Saturday");
									}else if($crow['DiaEmision'] == "2"){
										$d = "domingo  ";
										$ds=strtotime("next Sunday");
									}else if($crow['DiaEmision'] == "3"){
										$d = "lunes  ";
										$ds=strtotime("next Monday");
									}else if($crow['DiaEmision'] == "4"){
										$d = "martes  ";
										$ds=strtotime("next Tuesday");
									}else if($crow['DiaEmision'] == "5"){
										$d = "miercoles  ";
										$ds=strtotime("next Wednesday");
									}else if($crow['DiaEmision'] == "6"){
										$d = "jueves  ";
										$ds=strtotime("next Thursday");
									}else{
										$d = "viernes  ";
										$ds=strtotime("next Friday");
									}
									echo "<td class='proximo_ep'><b><i class='fas fa-arrow-circle-right'></i>  Proximo episodio el ".$d."</b><i class='far fa-calendar-alt'> </i> ".date('d-m-Y', $ds)."</td>";
								}

							}catch(Exception $e){
								echo "Error en linea: " . $e->getMessage();
							}
						?>
						<?php
							try {
								$id = $_GET['Id'];
								$nombre = $_GET['StrNombre'];
								include 'bin/core/conexion.php';

								$sql = "SELECT series.Id,series.StrSinopsis,capitulos.StrNombre,capitulos.IdRel,capitulos.Id FROM series INNER JOIN capitulos ON series.Id = capitulos.IdRel WHERE IdRel = ".$id." ORDER BY capitulos.nCap DESC";
								$resultado = $base->query($sql);
								$hayEpisodios = 0;//Establece el valor inicial de 0 capitulos
								while ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
									$cookie_name = $crow['Id'];
									$visto = "";
									if(!isset($_COOKIE[$cookie_name])) {
										$visto = "";
									} else {
										$visto .= "<div class='badge badge-pills badge-are-c'>Visto <i class='fas fa-check'></i></div>";
									}
									++$hayEpisodios;//Si hay capitulos aumenta la variable en la cantidad de episodios
									
									//Comprobamos capitulos vistos
									// if(isset($_SESSION["usuario"])){
									// 	$idUser = $_SESSION["idUser"]; 		//Id del usuario en la bd						
									// 	$sqlVisto = "SELECT * FROM vistos WHERE id_usuario = :usuario AND id_capitulo = :capitulo";
									// 	$usuario = htmlentities(addslashes($idUser));
									// 	$capitulo = htmlentities(addslashes($crow['Id']));
									// 	$resultadoVisto = $base->prepare($sqlVisto);
									// 	$resultadoVisto->bindValue(':usuario', $usuario);
									// 	$resultadoVisto->bindValue(':capitulo', $capitulo); 
									// 	$resultadoVisto->execute();
									// 	if($resultadoVisto->rowCount() > 0){
									// 		$visto .= "<div class='badge badge-pills badge-are-c'>Visto <i class='fas fa-check'></i></div>";
									// 	}
									// }
									echo  "
											<td style='border-bottom: 1px solid #ebcc43;'><a href='../../ver/".url($crow['Id'],$crow['StrNombre'])."'><i class='far fa-play-circle'></i> " . $crow['StrNombre'] . " ".$visto."</a></td>
											";
								}
								if($hayEpisodios == 0){//si no hay episodios devuelve un mensaje
									echo "No hay episodios agregados aun.";

								}
							}catch(Exception $e){
								echo "Error en linea: " . $e->getMessage();
							}
						?>
						
						</tr>
					  </table>
					</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<h1 style="margin:auto;" class="bdr-title title col-10" align="center"><i class="far fa-newspaper"></i> NOTICIAS</h1>
			<div class="row justify-content-center" style="display:flex;">
				<?php 
					require_once('noticias/wp-load.php');

					$wp_query = new \WP_Query();
					$wp_query->query('showposts=4');
					
					while ($wp_query->have_posts()) :
						$wp_query->the_post();
					
				?>
				<div class="are_post col-lg-10 p-0 m-1 mt-3 col-md-10 col-sm-10 col-10">
						<a href='<?php the_permalink(); ?>'>
						<div class="badge badge-pills badge-are date_are_n" style="position:absolute;margin-right:5px;margin-top:5px;right:1px;z-index:50;"><i class="fas fa-calendar-day"></i> <?php echo get_the_date(); ?></div>
						<div class="are_post_img_container"><?php the_post_thumbnail(); ?></div></a>
					<h5>
						<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
					</h5>
				
				</div>
		<?php endwhile; ?>
			</div>
			</div>
			</div>
	</div>
	<div class="container" style="padding:15px;">
		<div id="M439140ScriptRootC383461">
			<div id="M439140PreloadC383461">
				Loading...    </div>
				<script>
						(function(){
					var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById',lp=d.location.protocol,wp=lp.indexOf('http')==0?lp:'https:';
					var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M439140ScriptRootC383461")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
					catch(e){var iw=d;var c=d[gi]("M439140ScriptRootC383461");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=383461;c[ac](dv);
					var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src=wp+"//jsc.adskeeper.co.uk/a/n/animere.net.383461.js?t="+D.getYear()+D.getMonth()+D.getUTCDate()+D.getUTCHours();c[ac](s);})();
			</script>
		</div>
		<!-- Composite End -->
	</div>
	<div class="container">
		<div class="row">
				<?php

							try {
								$id = $_GET['Id'];
								$nombre = $_GET['StrNombre'];
								include 'bin/core/conexion.php';

								$sql = "SELECT series.Id,series.StrNombre,capitulos.IdRel FROM series INNER JOIN capitulos ON series.Id = capitulos.IdRel WHERE IdRel = ".$id."";
								$resultado = $base->query($sql);
								if ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
												echo"
												<div data-colorscheme='light' style='background-color:#ffeb97;' class='rounded fb-comments' data-href='https://animere.net/serie/".url($crow['Id'],$crow['StrNombre'])."' data-numposts='10' data-width='100%'></div>
													";
								
								}

							}catch(Exception $e){
								echo "Error en linea: " . $e->getMessage();
							}
						?>
		</div>
	</div>



	
	<?php include "footer.php"?>

	
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://animere.net/js/ajax.js"></script>
</body>
</html>