function scrap_datos(){
	var u = document.getElementById("URL").value

	var url ="datos.php";

	$.ajax({

		type:"post",
		url:url,
		data:{URL:u},

		success:function(datos){

			$("#resultados").html(datos);
		}
	}

		)
}