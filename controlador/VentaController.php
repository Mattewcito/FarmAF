<?php
include_once '../modelo/Venta.php';
include_once '../modelo/Cliente.php';
$cliente = new Cliente();
$venta = new Venta();
session_start();
$id_usuario = $_SESSION['usuario'];
if($_POST['funcion']=='listar'){
    $venta->buscar();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        if (empty($objeto->id_cliente)) {
            $cliente_nombre=$objeto->cliente;
            $cliente_dni=$objeto->dni;
        }
        else {
            $cliente->buscar_datos_cliente($objeto->id_cliente);
            foreach ($cliente->objetos as $cli) {
                $cliente_nombre=$cli->nombre.' '.$cli->apellidos;
                $cliente_dni=$cli->dni;
            }
            
        }
        $json['data'][]=array(
            'id_venta'=>$objeto->id_venta,
            'fecha'=>$objeto->fecha,
            'cliente'=>$cliente_nombre,
            'dni'=>$cliente_dni,
            'total'=>$objeto->total,
            'vendedor'=>$objeto->vendedor
        ); 
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='mostrar_consultas'){
    $venta->venta_dia_vendedor($id_usuario);
    foreach ($venta->objetos as $objeto) {
        $venta_dia_vendedor=$objeto->venta_dia_vendedor;
    }
    $venta->venta_diaria();
    foreach ($venta->objetos as $objeto) {
        $venta_diaria=$objeto->venta_diaria;
    }
    $venta->venta_mensual($id_usuario);
    foreach ($venta->objetos as $objeto) {
        $venta_mensual=$objeto->venta_mensual;
    }
    $venta->venta_anual();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=array(
            'venta_dia_vendedor'=>$venta_dia_vendedor,
            'venta_diaria'=>$venta_diaria,
            'venta_mensual'=>$venta_mensual,
            'venta_anual'=>$objeto->venta_anual
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if($_POST['funcion']=='venta_mes'){
    $venta->venta_mes();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='vendedor_mes'){
    $venta->vendedor_mes();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='ventas_anual'){
    $venta->ventas_anual();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='producto_mas_vendido'){
    $venta->producto_mas_vendido();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='cliente_mes'){
    $venta->cliente_mes();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json[]=$objeto;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>