<?php
require ('../../conexion.php');

        $sql = 'select * FROM registro WHERE id_codigo = '.$_POST['id'].'';
        $query2 = mysqli_query($conex,$sql);
        $row2 = mysqli_fetch_array($query2);   

?>
<!-- Contenido del MODAL Editar-->
  <div id="consulta">

<?php //echo "hola"; echo $_POST['id']; exit; ?>
   <?php 
    $idvar = $_POST['id']; 
    ?> 
    <form class="form-horizontal" role="form" action="validacion.php" method="post">
      <div class="form-group"> 
        <label for="cedula" class="col-lg-2 control-label">Codigo:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="codigo" name="cod" placeholder="Introduce el nuevo codigo" value="<?php echo $row2['codigo'];?>">
          </div>
      </div>
      <div class="form-group">
           
        <label for="nombre" class="col-lg-2 control-label">Nuevo Nombre SSID:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="nomssid" name="nom" placeholder="Introduce el nombre SSID" value="<?php echo $row2['nombre_ssid'];?>">
          </div>
      </div>
      <div class="form-group">
        <label for="apellido" class="col-lg-2 control-label">Nueva Contraseña SSID:</label>
           <div class="col-lg-10">
            <input type="text" class="form-control" id="conssid" name="con" placeholder="Introduce el contreseña SSID" value="<?php echo $row2['contrasena_ssid'];?>">
           </div>
      </div>
      <div class="form-group">
        <label for="apellido" class="col-lg-2 control-label">Nuevo Comentario:</label>
           <div class="col-lg-10">
            <input type="text" class="form-control" id="comenta" name="com" placeholder="Introduce el comantario" value="<?php echo $row2['comentario'];?>">
           </div>
      </div>
     
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit" value="Aceptar cambios"/>
            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <input type="hidden" name="idvar" value="<?php echo $idvar; ?>">
            <input type="hidden" name="val" value="3">
        </div>  
    </form> 
      
</div>  

