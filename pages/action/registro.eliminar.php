<?php
require ('../../conexion.php');

        $sql = 'select * FROM registro WHERE id_codigo = '.$_POST['id'].'';
        $query2 = mysqli_query($conex,$sql);
        $row2 = mysqli_fetch_array($query2);

?>
<!-- Contenido del MODAL Eliminar -->
  <div id="eliminar">
      <?php
    $idvar = $_POST['id']; 
    ?> 
        <div class="alert alert-info">
         <p>¿Realmente desea desactivar al usuario seleccionado?</p>
	</div>
      <form action="validacion.php" method="post">
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit" value="Aceptar"/>
            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <input type="hidden" name="idvar" value="<?php echo $idvar; ?>">
            <input type="hidden" name="val" value="4">    
        </div>
      </form>
</div>  

