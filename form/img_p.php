<?php
$nombre1 = $_POST['nombre'];
$nombre = str_replace(
    array('?', '!', '¡', '¿', '(', ')', '/', ';', ':',',','.',' '),
    '-',
    $nombre1);
if(isset($_POST['imagen_p'])){
    if(is_array($_FILES)) {
			/*IMAGEN PORTADA*/

			$file = $_FILES['imagen']['tmp_name']; 
			$sourceProperties = getimagesize($file);
			$fileNewName = $nombre. "_". date('Y-m-d-H:i:s');
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
			
			/*FUNCIONES*/
			// move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);

            $imagen = "../".$folderPath. $fileNewName. "_thump.". $ext_webpI;
        }


	try{
			include '../bin/core/conexion.php';
			$id = $_POST['id_p'];
			$sql = "UPDATE series SET StrImagen = '".$imagen."' WHERE series.Id='".$id."'";

			// Prepare statement
			$stmt = $base->prepare($sql);

			// execute the query
			$stmt->execute();

			// echo a message to say the UPDATE succeeded
			echo $stmt->rowCount() . " records UPDATED successfully";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		catch(PDOException $e)
			{
			echo $sql . "<br>" . $e->getMessage();
			}

    $base = null;
    }
    function imageResize($imageResourceId,$width,$height) {
        $targetWidth =225;
        $targetHeight =320;
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
        return $targetLayer;
    }
?>