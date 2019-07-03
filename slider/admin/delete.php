<?php

if(isset($_GET["id"])){
	include "db.php";
	$img = get_img($_GET["id"]);
	if($img!=null){
		del($img->id);
		unlink($img->folder.$img->src);
		header("Location: index.php");


	}
}


?>