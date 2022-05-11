<?php
include '../modelo/Estado.php';
$estado = new Estado();
if($_POST['funcion']=='llenar_estado'){
    $estado->llenar_estado();
    $json = array();
    foreach ($estado->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='cambiarEstado'){
    $nombre = $_POST['estado'];
    $estado->obtenerId($nombre);
    $json = array();
    foreach ($estado->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

