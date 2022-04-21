<?php
include '../modelo/Cliente.php';
$cliente = new Cliente();
if($_POST['funcion']=='buscar'){
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i:s');
    $fecha_actual = new DateTime($fecha);
    $cliente->buscar();
    $json=array();
    foreach ($cliente->objetos as $objeto) {
        $nac = new DateTime($objeto->edad);
        $edad = $nac->diff($fecha_actual);
        $edad_y = $edad->y;
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre.' '.$objeto->apellidos,
            'dni'=>$objeto->dni,
            'edad'=>$edad_y,
            'telefono'=>$objeto->telefono,
            'correo'=>$objeto->correo,
            'sexo'=>$objeto->sexo,
            'adicional'=>$objeto->adicional,
            'avatar'=>'../img/avatar1.jpg'
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}