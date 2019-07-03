<?php
$nombre1 = $_POST['nombre1'];
$nombre = str_replace(
    array('?', '!', '¡', '¿', '(', ')', '/', ';', ':',',','.',' '),
    '-',
    $nombre1);
if(isset($_POST['imagen_f'])){
	if(is_array($_FILES)) {
		$file2 = $_FILES['imagen-fondo']['tmp_name']; 
		$sourceProperties2 = getimagesize($file2);
		$fileNewName2 = $nombre. "_f". date('Y-m-d-H:i:s');
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
		$imagenbg = "../".$folderPath2. $fileNewName2. "_thump.". $ext_webp;
        }
        

try{
	include '../bin/core/conexion.php';
	$id = $_POST['id_f'];
	$sql = "UPDATE series SET StrImagenFondo = '".$imagenbg."' WHERE series.Id='".$id."'";

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

function imageResizeFondo($imageResourceId2,$width2,$height2) {
    $targetWidth2 =1920;
    $targetHeight2 =1080;
    $targetLayer2=imagecreatetruecolor($targetWidth2,$targetHeight2);
    imagecopyresampled($targetLayer2,$imageResourceId2,0,0,0,0,$targetWidth2,$targetHeight2, $width2,$height2);
    return $targetLayer2;
}
?>