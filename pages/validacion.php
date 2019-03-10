<?php
session_start(); 
require  '../conexion.php';
header("Content-Type: text/html; charset=utf-8");
switch ($_REQUEST['val']) {
	case 1: // Autenticacion de usuario
	
		break;
	
	case 2:// Subida de fichero xls
            if(!empty($_FILES['filex'])){
            $dir_subida = $_SERVER['DOCUMENT_ROOT'].'/proy-workana1/import/';
            $name = time().basename($_FILES['filex']['name']);
            $fic_subido = $dir_subida.$name;
        //    print_r($fic_subido);
            echo '<pre>';
            if (move_uploaded_file($_FILES['filex']['tmp_name'], $fic_subido)) {
              
             //   echo "El fichero es válido y se subió con éxito.\n";
                header('Location: /proy-workana1/pages/xls-usuario.php?token='.time().'$'.$name);
                echo '<script>window.location = "xls-usuario.php";</script>';
            } else {
                echo "¡No se logro subir el ficheros!\n";
            }

            echo 'Más información de depuración:';
            print_r($_FILES);

            print "</pre>";         
         }
      
	case 3: // Asignar Usuarios 

            if (isset($_POST['cod']) && !empty ($_POST['cod']) &&
                isset($_POST['nom']) && !empty ($_POST['nom']) &&
                isset($_POST['con']) && !empty ($_POST['con']) &&
                isset($_POST['com']) && !empty ($_POST['com']) ) 
                {           
			$sql = "UPDATE registro 
                                SET    codigo = '".$_POST['cod']."',
                                       nombre_ssid = '".$_POST['nom']."', 
                                       contrasena_ssid = '".$_POST['con']."', 
                                       comentario = '".$_POST['com']."'
                                WHERE  id_codigo = '".$_POST['idvar']."'";  
                        
                        mysqli_query($conex,$sql);
                        
			if (mysqli_error($conex)) 
                        { 
                           // echo '<script>history.back();</script>';
                            echo '<script>alert("Error al modificar el registro");</script>';
			}
			else 
                            { 	 //echo'Mensaje de usuario modificado con exito';
                                echo '<script>window.location = "guardar.php";</script>';
                            }
		} 
		else 
                    {
                    //   echo '<script>history.back();</script>';
                        echo '<script>alert("Ingresar datos en los campos vacios");</script>';  
                    }
                    break;
                    
            case 4: // Inactivar Registro
            
                    $sql = "UPDATE registro 
                            SET    status = '0' 
                            WHERE  id_codigo = ".$_POST['idvar']."";    

			mysqli_query($conex,$sql);

			if (mysqli_error($conex)) { 	
				echo '<script>history.back();</script>';
                echo '<script>alert("Error al desactivar el usurio");</script>';
			}

			else { 	// Mensaje de usuario modificado con exito
                echo '<script>window.location = "guardar.php";</script>';
				echo '<script>history.back();</script>';
			}
		
		break;
	case 5: // Insertar Registro
            error_reporting(E_ALL ^ E_NOTICE); // elimina las noticias
            
            if (isset($_POST['cod']) && !empty ($_POST['cod']) &&
                isset($_POST['nom']) && !empty ($_POST['nom']) &&
                isset($_POST['con']) && !empty ($_POST['con']) &&
                isset($_POST['com']) && !empty ($_POST['com'])) {

			$sql = "insert into registro 
                                values ('',
                                        '".$_POST['cod']."',
                                        '".$_POST['nom']."',
                                        '".$_POST['con']."',
                                        '".$_POST['com']."',
                                        '1')";
                        mysqli_query($conex,$sql);
                        

			if (mysqli_error($conex)) { 	
				echo '<script>alert("Error al registrar el reporte");</script>';
                                echo '<script>window.location = "registro.php";</script>';
			}

			else { 	// Mensaje de usuario registrado con exito
                            $ide = $_POST['ide'];
                                echo '<script>alert("Enviado satistactoriamente");</script>';
                                echo '<script>window.location = "guardar.php";</script>';
			}
		} 
		else {
		    echo '<script>alert("Ingresar datos en los campos vacios");</script>';  
                    echo '<script>window.location = "registro.php";</script>';
		}

		break;

	case 6: // Editar cliente registrado
            
            if (isset($_POST['idvar']) && !empty ($_POST['idvar'])&&
                isset($_POST['ema']) && !empty ($_POST['ema'])&&
                isset($_POST['tel']) && !empty ($_POST['tel'])&&
                isset($_POST['loc']) && !empty ($_POST['loc'])&&
                isset($_POST['ciu']) && !empty ($_POST['ciu'])&&
                isset($_POST['dir']) && !empty ($_POST['dir'])&&
                isset($_POST['pos']) && !empty ($_POST['pos'])) 
                {
			$sql = "UPDATE registro 
                                SET email = '".$_POST['ema']."',
                                    telefono = '".$_POST['tel']."',
                                    localidad = '".$_POST['loc']."',
                                    ciudad = '".$_POST['ciu']."',
                                    direccion = '".$_POST['dir']."',
                                    postal = '".$_POST['pos']."'
                                WHERE id_registro = '".$_POST['idvar']."'";
                        
                        mysqli_query($conex,$sql);
                        
			if (mysqli_error($conex)) 
                        { 
                            echo '<script>alert("Error al modificar el cliente");</script>';
                            echo '<script>window.location = "operador.cliente.php";</script>';
			}
			else 
                            { 	// Mensaje de usuario modificado con exito
                            echo '<script>window.location = "operador.cliente.php";</script>';
			
                            }
		} 
		else 
                    {
                        echo '<script>alert("Ingresar datos en los campos vacios");</script>';  
                        echo '<script>window.location = "operador.cliente.php";</script>';
                    }
                    break;
	
	case 7: // Salir de la tienda
                session_unset();
                session_destroy();
	 	echo '<script>alert("Ha salido del sistema.");</script>';   
                echo '<script>window.location = "registro.php";</script>';
		break;
        
        case 8: // Insertar Reporte de cliente por el operador
            error_reporting(E_ALL ^ E_NOTICE); // elimina las noticias
            
            if (isset($_POST['ide']) && !empty ($_POST['ide']) &&
                isset($_POST['nom']) && !empty ($_POST['nom']) &&
                isset($_POST['ape']) && !empty ($_POST['ape']) &&
                isset($_POST['ema']) && !empty ($_POST['ema']) &&
                isset($_POST['tel']) && !empty ($_POST['tel'])){

			$sql = "insert into registro 
                                values ('',
                                        '".$_POST['date']."',
                                        '".$_POST['ref']."',
                                        '".$_POST['ide']."',
                                        '".$_POST['nom']."',
                                        '".$_POST['ape']."',
                                        '".$_POST['ema']."',
                                        '".$_POST['tel']."',
                                        '".$_POST['exp']."',
                                        '',
                                        '',
                                        '',
                                        '0',
                                        'N° operador: ".$_SESSION['id_usuario']."')";
                        mysqli_query($conex,$sql);
                        
                        $sql = "insert into usuario_registro 
                            values ('',
                                    '".$_SESSION['id_usuario']."',
                                    '".$_POST['num']."')";
                        mysqli_query($conex,$sql);

			if (mysqli_error($conex)) { 	
				echo '<script>alert("Error al registrar el reporte");</script>';
                                echo '<script>window.location = "registro.cliente.php";</script>';
			}

			else { 	// Mensaje de usuario registrado con exito
                                echo '<script>alert("Enviado satistactoriamente");</script>';
                                echo '<script>window.location = "registro.cliente.php";</script>';
//				
			}
		} 
		else {
		    echo '<script>alert("Ingresar datos en los campos vacios");</script>';  
                    echo '<script>window.location = "registro.cliente.php";</script>';
		}

		break;
			
	default:
		
		break;
}
?>