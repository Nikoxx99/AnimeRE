<?php
	if(isset($_POST['estado'])){
		$estado = $_POST['estado1'];
		$id = $_POST['ids'];
		try{
			include '../bin/core/conexion.php';
			$sql = "UPDATE series SET estado1 = '".$estado."' WHERE series.Id='".$id."'";

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

	$conn = null;
	}
?>