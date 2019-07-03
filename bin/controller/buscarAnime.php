<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru, Niko_  -->
<?php 
	include '../core/conexion.php';
	include '../bin/funciones.php';
	$buscar = '';
	if(isset($_POST['buscar'])) {
		$buscar = $_POST['buscar'];
	}
	$sql = "SELECT * FROM series WHERE StrNombre LIKE '%".$buscar."%' LIMIT 5";
	$resultado = $base->query($sql);
	$fila = $resultado->fetch(PDO::FETCH_ASSOC);
	$total = count($fila);
?>
<?php 
	if($total>0 && $buscar!='') { ?>
	<div class="resultado">
			<h6>Se encontro:</h6>
<?php
	do {
?>
	<div class="resultado-q">

<?php 
	 echo "
	 <div class='container'>
		<div class='row'>
			<div class='col-3'>
				<figure class='q_img'><img class='img-fluid' src='".$fila['StrImagen']."' alt=''></figure>
			</div>
			<div class='col-9'>
				<h5>
					<a href='../../serie/".url($fila['Id'],$fila['StrNombre'])."'>" . $fila['StrNombre'] . "</a>
				</h5>
			</div>
		</div>
	</div>
		
	 ";

?>
</div>
<?php
	}while($fila=$resultado->fetch(PDO::FETCH_ASSOC));
?>
<?php
	}
	elseif($total>0 && $buscar=='') echo "";
	else echo "<div class='resultado'><h6>No se encontraron resultados</h6></div>";
?>
