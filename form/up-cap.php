<!--AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	$nombre1 = $_POST['name'];
	$url1 = $_POST['url1'];
	$url2 = $_POST['url2'];
	$url3 = $_POST['url3'];
	$url4 = $_POST['url4'];
	$url5 = $_POST['url5'];
	$url6 = $_POST['url6'];
	$url7 = $_POST['url7'];
	$urld = $_POST['urld'];
	$urld2 = $_POST['urld2'];
	$urld3 = $_POST['urld3'];
	$idrel = $_POST['idrel'];
	$oculto = $_POST['oculto'];
	$nCap = $_POST['nCap'];
	$nombre2 = str_replace('?',' ',$nombre1);
	$nombre = str_replace(' ','-',$nombre2);

	if (isset($_FILES)) {
		if(is_array($_FILES) && $_FILES['hls']['size'] > 0) {
			$file_hls = $_FILES['hls']['tmp_name']; 
			$fileNewName_hls = $nombre. "_". $nCap;
			$folderPath_hls = "../../cdn/caps/";
			$folderPath_hls_move = "../cdn/caps/";
	
			move_uploaded_file($file_hls, $folderPath_hls_move. $fileNewName_hls. ".m3u8");
			$hls = $folderPath_hls. $fileNewName_hls. ".m3u8";
		}else{
			$hls = "";
		}
	}

	/*PROCESADOR DE IMAGENES*/
		if(is_array($_FILES)) {
			$file = $_FILES['imagen']['tmp_name']; 
			$sourceProperties = getimagesize($file);
			$fileNewName = $nombre. "_". date('Y-m-d');
			$folderPath = "../img/capitulos/";
			$ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
			$ext_webp = "webp";
			$imageType = $sourceProperties[2];
			switch ($imageType) {
				case IMAGETYPE_PNG:
					$imageResourceId = imagecreatefrompng($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagewebp($targetLayer,$folderPath. $fileNewName. "_thump.". $ext_webp,70);
					ob_start();
					imagejpeg($targetLayer,NULL,70);
					$image_data = ob_get_contents();
					ob_end_clean(); 
					break;
				case IMAGETYPE_JPEG:
					$imageResourceId = imagecreatefromjpeg($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagewebp($targetLayer,$folderPath. $fileNewName. "_thump.". $ext_webp,70);
					ob_start();
					imagejpeg($targetLayer,NULL,70);
					$image_data = ob_get_contents();
					ob_end_clean(); 
					break;
				
				default:
					echo "Las imagenes solo puedes ser: .JPG o .PNG";
					exit;
					break;
			}


			// move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
			$imagen = $folderPath. $fileNewName. "_thump.". $ext_webp;
			$image_b64 = "data:image/jpeg;base64,". base64_encode($image_data);
 
		}
		function imageResize($imageResourceId,$width,$height) {
			$targetWidth =720;
			$targetHeight =405;
			$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
			imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
			return $targetLayer;
		}



	if($idrel!= 0){
	try{
		include '../bin/core/conexion.php';
		$sql="INSERT INTO capitulos (StrNombre, StrImagen, StrImagenFb, HLS, StrOpcion1, StrOpcion2, StrOpcion3, StrOpcion4, StrOpcion5, StrOpcion6, StrOpcion7,
		 StrOpcionD, StrOpcionD2, StrOpcionD3, IdRel, nCap, oculto) 
		VALUES (:nombre, :image_b64, :imagen, :hls, :url1, :url2, :url3, :url4, :url5, :url6, :url7, :urld, :urld2, :urld3, :idrel, :nCap, :oculto)";
			
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$nombre1, ":image_b64"=>$image_b64, ":imagen"=>$imagen, ":hls"=>$hls, ":url1"=>$url1, ":url2"=>$url2, ":url3"=>$url3, ":url4"=>$url4, ":url5"=>$url5, ":url6"=>$url6, ":url7"=>$url7,
			":urld"=>$urld, ":urld2"=>$urld2, ":urld3"=>$urld3, ":idrel"=>$idrel, ":nCap"=>$nCap, ":oculto"=>$oculto));
		$resultado->closeCursor();
		header('location: ../admin/subir-cap.php');
	}catch(Exception $e){
		echo "Fallo en la base datos" . $e->getMessage();
	}
	}else{
		echo "Tienes que seleccionar una serie a la cual agregar el episodio.";
	}
?>