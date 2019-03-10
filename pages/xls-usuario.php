<?php

require '../vendor/PhpSpreadsheet-master/vendor/autoload.php';
require '../conexion.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

/* Jalar la data
    $sql = "select * from registro where status = 1";
    $query = mysqli_query($conex,$sql);
    $num = mysqli_num_rows($query); 
*/    
// Establecemos la ruta 
$param = $_GET['token'];
$params = explode('$',$param);
$filename = $params[1];
//var_dump(getcwd());die;
$rut_serv = getcwd();
$rserv = str_replace('\\', '/', $rut_serv);
//$ruta = implode('/', explode('\\',getcwd()));
//$ruta = substr ($ruta, 0, strlen($ruta) - 5);
$ruta = substr ($rserv, 0, strlen($rserv) - 5).'import/';

//    $inputFileType = 'Xls';
$inputFileType = 'Xlsx';
//    $inputFileType = 'Xml';
//    $inputFileType = 'Ods';
//    $inputFileType = 'Slk';
//    $inputFileType = 'Gnumeric';
//    $inputFileType = 'Csv';
$inputFileName = $ruta.$filename;

// var_dump($hoja->getCell('B3')->getValue());exit;

// para extension especifica 
$reader = IOFactory::createReader($inputFileType);
$archivo = $reader->load($inputFileName);
//establecemos en que hoja se cargara 
//getActive obtiene la hoja activa, por lo general es la primera 
//getsheet(1)= segunda hoja 

$hoja = $archivo->getActiveSheet();
//$sheet= $spreadsheet->getSheet(0);
//$sheet= $spreadsheet->getSheetByName("");

$flag = true;
foreach ($hoja->getRowIterator() as $row){
    if($flag){$flag=false;continue;}
    $cellIterator = $row->getCellIterator();
    // var_dump($cellIterator);exit;
    // $cellIterator->setIterateOnlyExistingCell(false);
    $sql = 'INSERT INTO registro (codigo,nombre_ssid,contrasena_ssid,comentario) values (';
    foreach($cellIterator as $cell){
        if(!is_null($cell)){
            $value = $cell->getCalculatedValue();
            $sql .= '\''.$value.'\',';
        }
    }
    $sql = substr ($sql, 0, strlen($sql) - 1);
    $sql .= ');';
    mysqli_query($conex,$sql);
    if (mysqli_error($conex)) { 
        // echo '<script>history.back();</script>';
        echo '<script>alert("Error al modificar el registro");</script>';
    }
    else {
        echo'Mensaje de usuario modificado con exito';
        echo '<script>window.location = "guardar.php";</script>';
    }

}

?>