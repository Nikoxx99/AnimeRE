<form action="../../form/report.php" method="post">
  <div class="form-group">
    <br><br>
    <input name="email_usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
    <small id="emailHelp" class="form-text text-muted">Ingresa tu correo para tenerte informado sobre el reporte</small>
  </div>
  <div class="form-group">
    <div class=""><select class="form-control" type="text" name="tipo_reporte">
    <option value="0">(Selecciona una opcion)</option>
	<option value="1">Capitulo Caído</option>
	<option value="2">El capitulo es de otra serie o el orden es erroneo</option></select></div>
    <small id="emailHelp" class="form-text text-muted">Especifica el tipo de problema que tienes</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Especifica mas a fondo (Opcional)</label><br>
    <textarea name="mensaje" id="" cols="30" rows="2" style="width:100%;"></textarea>
  </div>
  <input name="id_capitulo" type="hidden" value="<?php echo $crow['StrNombre'];?>">
  <input name="fecha_reporte" type="hidden" value="<?php echo date("Y-m-d H:i:s");?>">
  <button type="submit" class="btn btn-primary">Enviar Reporte</button>
</form>