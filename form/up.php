<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	$nombre1 = $_POST['name'];
	$sinopsis = $_POST['sinopsis'];
	$fechaestreno = $_POST['fecha-estreno'];
	$estado = $_POST['estado1'];
	$a1 = $_POST['gnero1'];
	$a2 = $_POST['gnero2'];
	$a3 = $_POST['gnero3'];
	$a4 = $_POST['gnero4'];
	$a5 = $_POST['gnero5'];
	$dia = $_POST['DiaEmision'];
	$tipo = $_POST['tipo'];
	$enSlider = $_POST['enSlider'];
	$nombre = str_replace(
		array('?', '!', '¡', '¿', '(', ')', '/', ';', ':',',','.',' '),
		'-',
		$nombre1);


		/*PROCESADOR DE IMAGENES*/
		if(is_array($_FILES)) {
			/*IMAGEN PORTADA*/

			$file = $_FILES['imagen']['tmp_name']; 
			$sourceProperties = getimagesize($file);
			$fileNewName = $nombre. "_". date('Y-m-d');
			$folderPath = "../img/series/";
			$ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
			$ext_webpI = "jpg";
			$imageType = $sourceProperties[2];
			switch ($imageType) {
				case IMAGETYPE_PNG:
					$imageResourceId = imagecreatefrompng($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext_webpI,70);
					break;
				case IMAGETYPE_GIF:
					$imageResourceId = imagecreatefromgif($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext_webpI,70);
					break;
				case IMAGETYPE_JPEG:
					$imageResourceId = imagecreatefromjpeg($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext_webpI,70);
					break;
				default:
					echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
					exit;
					break;
			}
			/*IMAGEN FONDO*/
			$file2 = $_FILES['imagen-fondo']['tmp_name']; 
			$sourceProperties2 = getimagesize($file2);
			$fileNewName2 = $nombre. "_f". date('Y-m-d');
			$folderPath2 = "../img/series/";
			$ext2 = pathinfo($_FILES['imagen-fondo']['name'], PATHINFO_EXTENSION);
			$ext_webp = "jpg";
			$imageType2 = $sourceProperties2[2];
			switch ($imageType2) {
				case IMAGETYPE_PNG:
					$imageResourceId2 = imagecreatefrompng($file2); 
					$targetLayer2 = imageResizeFondo($imageResourceId2,$sourceProperties2[0],$sourceProperties2[1]);
					imagejpeg($targetLayer2,$folderPath2. $fileNewName2. "_thump.". $ext_webp,90);
					break;
				case IMAGETYPE_GIF:
					$imageResourceId2 = imagecreatefromgif($file2); 
					$targetLayer2 = imageResizeFondo($imageResourceId2,$sourceProperties2[0],$sourceProperties2[1]);
					imagejpeg($targetLayer2,$folderPath2. $fileNewName2. "_thump.". $ext_webp,90);
					break;
				case IMAGETYPE_JPEG:
					$imageResourceId2 = imagecreatefromjpeg($file2); 
					$targetLayer2 = imageResizeFondo($imageResourceId2,$sourceProperties2[0],$sourceProperties2[1]);
					imagejpeg($targetLayer2,$folderPath2. $fileNewName2. "_thump.". $ext_webp,90);
					break;
				default:
					echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
					exit;
					break;
			}
			/*FUNCIONES*/
			// move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);

			$imagen = "../".$folderPath. $fileNewName. "_thump.". $ext_webpI;
			$imagenbg = "../".$folderPath2. $fileNewName2. "_thump.". $ext_webp;
			}
		function imageResize($imageResourceId,$width,$height) {
			$targetWidth =225;
			$targetHeight =320;
			$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
			imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
			return $targetLayer;
		}
		function imageResizeFondo($imageResourceId2,$width2,$height2) {
			$targetWidth2 =1920;
			$targetHeight2 =1080;
			$targetLayer2=imagecreatetruecolor($targetWidth2,$targetHeight2);
			imagecopyresampled($targetLayer2,$imageResourceId2,0,0,0,0,$targetWidth2,$targetHeight2, $width2,$height2);
			return $targetLayer2;
		}



	try{
		include '../bin/core/conexion.php';
		$sql="INSERT INTO series (StrNombre, StrImagen, StrImagenFondo, StrFechaEstreno, estado1, StrSinopsis, A1,A2,A3,A4,A5,DiaEmision,tipo,enSlider)
		VALUES (:nombre, :imagen, :imagenbg, :fechaestreno, :estado1, :sinopsis,:A1,:A2,:A3,:A4,:A5,:DiaEmision,:tipo,:enSlider)";
			
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":nombre"=>$nombre1, ":imagen"=>$imagen, ":imagenbg"=>$imagenbg, ":fechaestreno"=>$fechaestreno, ":estado1"=>$estado, 
		":sinopsis"=>$sinopsis, ":A1"=>$a1, ":A2"=>$a2, ":A3"=>$a3, ":A4"=>$a4, ":A5"=>$a5, ":DiaEmision"=>$dia,":tipo"=>$tipo,":enSlider"=>$enSlider));
		$resultado->closeCursor();
		header('location: ../admin/subir.php');
	}catch(Exception $e){
		echo "Fallo en la base datos" . $e->getMessage();
	}
?>