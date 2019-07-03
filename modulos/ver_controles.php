<div class="container">
	<div style="padding-left:15px;padding-right:15px;" class="row justify-content-md-center">
		<?php 
			try {
				include "../bin/core/conexion.php";
				$id = $_GET['Id'];					
				$nombre = $_GET['StrNombre'];

				//Obtener información del capítulo actual
				$sql="SELECT idRel, nCap FROM capitulos WHERE Id='".$id."'";
				$resultado= $base->prepare($sql);
				$resultado->execute(array());
				$capData=$resultado->fetch(PDO::FETCH_ASSOC);
				$capIdRel = $capData['idRel'];
				$capNCap = $capData['nCap'];
							
				//Capitulo anterior
				$sql="SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE IdRel = ".$capIdRel." AND nCap = " . (string)($capNCap - 1);
				$resultado= $base->prepare($sql);
				$resultado->execute(array());
				$crow=$resultado->fetch(PDO::FETCH_ASSOC);
				if($capNCap == 1){
					echo"<div style='border-radius: 5px 0px 0px 0px;
					-moz-border-radius: 5px 0px 0px 0px;
					-webkit-border-radius: 5px 0px 0px 0px;
					' class='btn btn-primary col-lg-1 col-md-3 col-sm-3 col-3 btn-block'><span class=' pull-right fas fa-chevron-left' disabled></span></div>";
				}else{
					echo"<div style='border-radius: 5px 0px 0px 0px;
					    -moz-border-radius: 5px 0px 0px 0px;
						-webkit-border-radius: 5px 0px 0px 0px;
						' class='btn btn-primary col-lg-1 col-md-3 col-sm-3 col-3 btn-block'><a href='../".url($crow['Id'],$crow['StrNombre'])."'><span class=' pull-right fas fa-chevron-left'></span></a></div>";
					}
							
				//Lista de Capitulos
				$cod = $_GET['Id'];				
				$nombre = $_GET['StrNombre'];

				include"../bin/core/conexion.php";
				$sql="SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
				$resultado= $base->query($sql);
				$resultado->execute(array());
				if($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
					echo"<div style='padding-left:0;padding-right:0;border-left: solid 1px #290944;border-right:solid 1px #290944;' class='col-lg-10 col-md-6 col-sm-6 col-6'><a class='rounded-0 btn btn-primary btn-block' href='../../serie/".url($crow['IdRel'],$crow['StrNombre'])."'<span class='glyphicon glyphicon-th-list'></span>Lista de Capitulos</a></div>";
				}

				//Capitulo siguiente
				$sql = "SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE IdRel = $capIdRel AND nCap = " . (string)($capNCap + 1);
				$resultado= $base->prepare($sql);
				$resultado->execute(array());
				$crow = $resultado->fetch(PDO::FETCH_ASSOC);

				if($resultado->rowCount() > 0){
					echo"<div style='border-radius: 0px 5px 0px 0px;
					-moz-border-radius: 0px 5px 5px 0px;
					-webkit-border-radius: 0px 5px 0px 0px;
					' class='col-lg-1 col-md-3 col-sm-3 col-3 btn btn-primary btn-block'><a href='../".url($crow['Id'],$crow['StrNombre'])."'><span class=' pull-right fas fa-chevron-right'></span></a></div>";
				}else{
					echo"<div style='border-radius: 0px 5px 0px 0px;
					-moz-border-radius: 0px 5px 5px 0px;
					-webkit-border-radius: 0px 5px 0px 0px;
					' class='col-lg-1 col-md-3 col-sm-3 col-3 btn btn-primary btn-block'><span class=' pull-right fas fa-chevron-right' disabled></span></div>";
				}

				}catch(Exception $e) {
					echo "Fallo en la base de datos" . $e->getMessage();
				}
			?>
    </div>
</div>