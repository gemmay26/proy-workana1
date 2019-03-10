<!DOCTYPE html>
<html lang="en">
<?php
require  '../conexion.php';
?>
<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Proyecto Workana</title>


    <!----     CSS        ------>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    
    <?php 
        $sql = "select * from registro;";
        $query = mysqli_query($conex,$sql);
        $num = mysqli_num_rows($query); 
        $num++;
       // date_default_timezone_set('America/Lima');
    ?>
    
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario de registro</h3>
                    </div>
                    <div class="panel-body">
                        <form action="validacion.php" method="post">
                            <fieldset>
                            
                                <div class="form-group">
                                    <input class="form-control btn disabled" placeholder="N° de Registro" type="text" value="N° de Registro = <?php echo "$num";?>" disabled>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Codigo" name="cod" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre SSID" name="nom" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña SSID" name="con" type="text">
                                </div>
                              
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Comentarios" name="com"></textarea>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Registrar">
                                <a href="guardar.php" class=" btn btn-lg btn-danger btn-block">Cancelar</a>
                                <input type="hidden" name="val" value="5">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
