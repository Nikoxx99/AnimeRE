<?php
$id_capitulo = $_POST['id_capitulo'];
$mensaje = $_POST['mensaje'];
$tipo_reporte = $_POST['tipo_reporte'];
$fecha_reporte = $_POST['fecha_reporte'];
$email_usuario = $_POST['email_usuario'];


try{
    include '../bin/core/conexion.php';
    $sql="INSERT INTO reportes (email_usuario, id_capitulo, fecha_reporte, tipo_reporte, mensaje) 
    VALUES (:email_usuario, :id_capitulo, :fecha_reporte, :tipo_reporte, :mensaje)";
        
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":email_usuario"=>$email_usuario, ":id_capitulo"=>$id_capitulo, ":fecha_reporte"=>$fecha_reporte,
        ":tipo_reporte"=>$tipo_reporte, ":mensaje"=>$mensaje));
    $resultado->closeCursor();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}catch(Exception $e){
    echo "Fallo en la base datos" . $e->getMessage();
}


?>