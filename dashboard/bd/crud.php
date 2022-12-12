<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$num_exp = (isset($_POST['num_exp'])) ? $_POST['num_exp'] : '';
$materia_exp = (isset($_POST['materia_exp'])) ? $_POST['materia_exp'] : '';
$nom_procesado = (isset($_POST['nom_procesado'])) ? $_POST['nom_procesado'] : '';
$nom_agraviado = (isset($_POST['nom_agraviado'])) ? $_POST['nom_agraviado'] : '';
$encargado = (isset($_POST['encargado'])) ? $_POST['encargado'] : '';
$estado_exp = (isset($_POST['estado_exp'])) ? $_POST['estado_exp'] : '';
$ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : '';
$folios = (isset($_POST['folios'])) ? $_POST['folios'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO expedientes (num_exp, materia_exp, nom_procesado, nom_agraviado, encargado, estado_exp, ubicacion, folios) VALUES('$num_exp', '$materia_exp', '$nom_procesado', '$nom_agraviado', '$encargado','$estado_exp','$ubicacion','$folios') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, num_exp, materia_exp, nom_procesado, nom_agraviado,encargado,estado_exp,ubicacion,folios FROM expedientes ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE expedientes SET num_exp='$num_exp', materia_exp='$materia_exp', nom_procesado='$nom_procesado' , nom_agraviado='$nom_agraviado', encargado = '$encargado',estado_exp = '$estado_exp',ubicacion = '$ubicacion',folios = '$folios' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, num_exp, materia_exp, nom_procesado, nom_agraviado, encargado, estado_exp, ubicacion, folios FROM expedientes WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM expedientes WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
