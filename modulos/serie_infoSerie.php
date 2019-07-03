<div class="container-fluid">
	<?php 
		require_once ("bin/bin/funciones.php");
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
			    ";}

		}catch(Exception $e){
			echo "Error en linea: " . $e->getMessage();
		}
	?>
	<?php
        if(!isset($_SESSION["usuario"])) {
            echo '<br>';
                } else {
                    echo '
						<div  class="jumbotron">
			            	<b style="z-index:99;left:20px">
			            		<form method="post" action="../../form/refrescar.php">
			            			<div class="space">
			            			<select class="space form-control" type="text" name="estado1">
										<option value="Finalizado">Finalizado</option>
										<option value="En Emision">En Emision</option>
									</select>
									</div>
										<input  type="hidden" name="ids" value ="'.$id.'" readonly>
										<input type="submit" class="btn btn-success" value="Actualizar">
			            		</form>
			            	</b>
                        </div>
                        ' ;
                }
            ?> 
</div>