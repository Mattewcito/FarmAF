<?php
include '../modelo/Cliente.php';
$cliente = new Cliente();
if($_POST['funcion']=='buscar'){
    $cliente->buscar();
    $json=array();
    foreach ($cliente->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre.' '.$objeto->apellidos,
            'dni'=>$objeto->dni,
            'telefono'=>$objeto->telefono,
            'correo'=>$objeto->correo,
            'sexo'=>$objeto->sexo,
            'avatar'=>'../img/avatar1.jpg'
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo= $_POST['correo'];
    $sexo = $_POST['sexo'];
    $avatar = 'prov_default.png';

    $cliente->crear($nombre,$apellido,$dni,$telefono,$correo,$sexo,$avatar);
}
if($_POST['funcion']=='editar'){
    $id = $_POST['id'];
    $telefono = $_POST['telefono'];
    $correo= $_POST['correo'];

    $cliente->editar($id,$telefono,$correo);
}
if($_POST['funcion']=='borrar'){
    $id=$_POST['id'];
    $cliente->borrar($id);
}
if($_POST['funcion']=='llenar_clientes'){
    $cliente->llenar_clientes();
    $json = array();
    foreach ($cliente->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre.' '.$objeto->apellidos.' | '.$objeto->dni
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}