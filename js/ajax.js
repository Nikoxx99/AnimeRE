/*<!-- RECOMIENDA MI CURSO TE LO AGRADECERIA MUCHISIMO -->
<!-- PROGRANDOM, no olvides suscribirte a mi canal -->*/
$(function() {
  $("#form-search").submit(function(e) {
    e.preventDefault();
  });
  $("#buscar").keyup(function() {
    var envio = $("#buscar").val();
    $("#resultado-q").html(
      '<h4><img src="img/loading.gif" width="20" height="20" /> Cargando</h4>'
    );
    $.ajax({
      type: "post",
      url: "https://animere.net/bin/controller/buscarAnime.php",
      data: "buscar=" + envio,
      success: function(respuesta) {
        if (respuesta != "") {
          $("#resultado-q").html(respuesta);
        }
      }
    });
  });
});
