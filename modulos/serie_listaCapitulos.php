<div id="caps_scrollbar" class="are-in container tabla_episodios">
	<div class="panel-heading"><h2 style="padding:3px;border-bottom: 1px solid #dee2e6;color:#ebcc34;">Lista de Capitulos</h2></div>
		<div class="col-md-8">
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
								if ($crow['estado1'] == "Finalizado" ){
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
								while ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
									$clase = "episodio";
								
									//Comprobamos capitulos vistos
									if(isset($_SESSION["usuario"]))
									{
										$idUser = $_SESSION["idUser"]; 		//Id del usuario en la bd						
										$sqlVisto = "SELECT * FROM vistos WHERE id_usuario = :usuario AND id_capitulo = :capitulo";
										$usuario = htmlentities(addslashes($idUser));
										$capitulo = htmlentities(addslashes($crow['Id']));
										$resultadoVisto = $base->prepare($sqlVisto);
										$resultadoVisto->bindValue(':usuario', $usuario);
										$resultadoVisto->bindValue(':capitulo', $capitulo); 
										$resultadoVisto->execute();
										if($resultadoVisto->rowCount() > 0)
										{
											$clase .= " visto";
										}
									}

									echo"
											<td><a class='$clase' href='../../ver/".url($crow['Id'],$crow['StrNombre'])."'><i class='far fa-play-circle'></i> " . $crow['StrNombre'] . " </a></td>
										";
								
								}

							}catch(Exception $e){
								echo "Error en linea: " . $e->getMessage();
							}
						?>
					</tr>
				</table>
			</div>
		</div>
	</div>