<?php

/**
* Conexion a la base de datos y funciones
* Autor: evilnapsis
**/

function con(){
	return new mysqli("localhost","yjlzwyuv_animere1","WeAre@AnimeRE20","yjlzwyuv_slider");
}

function insert_img($title, $sinopsis, $url, $folder, $image){
	$con = con();
	$con->query("insert into image (title,sinopsis,url,folder,src,created_at) value (\"$title\",\"$sinopsis\",\"$url\",\"$folder\",\"$image\",NOW())");
}

function get_imgs(){
	$images = array();
	$con = con();
	$query=$con->query("select * from image order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}

function get_img($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from image where id=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del($id){
	$con = con();
	$con->query("delete from image where id=$id");
}

?>