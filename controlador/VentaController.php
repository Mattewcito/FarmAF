<?php
include '../modelo/Venta.php';
$venta = new Venta();
session_start();
$id_usuario = $_SESSION['usuario'];
if($_POST['funcion']=='listar'){
    $venta->buscar();
    $json=array();
    foreach ($venta->objetos as $objeto) {
        $json['data'][]=$objeto;
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
?>