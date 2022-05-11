<?php
include_once '../modelo/Compras.php';
include_once '../modelo/Lote.php';
require_once ("../vendor/autoload.php");
use Dompdf\Dompdf;
$lote = new Lote();
$compras = new Compras();
if($_POST['funcion']=='registrar_compra'){
    $descripcion = json_decode($_POST['descripcionString']);
    $productos = json_decode($_POST['productosString']);
    $compras->crear($descripcion->codigo,$descripcion->fecha_compra,$descripcion->fecha_entrega,$descripcion->total,$descripcion->estado,$descripcion->proveedor);
    $compras->ultima_compra();
    foreach ($compras->objetos as $objeto) {
        $id_compra = $objeto->ultima_compra;
    }
    foreach ($productos as $prod) {
        $lote->crear_lote($prod->codigo,$prod->cantidad,$prod->vencimiento,$prod->precio_compra,$id_compra,$prod->id);
    }
    echo 'add';
}
if($_POST['funcion']=='listar_compras'){
    $compras->listar_compras();
    $cont=0;
    foreach ($compras->objetos as $objeto) {
        $cont++;
        $json[]= array(
            'numeracion'=>$cont,
            'codigo'=>$objeto->codigo,
            'fecha_compra'=>$objeto->fecha_compra,
            'fecha_entrega'=>$objeto->fecha_entrega,
            'total'=>$objeto->total,
            'estado'=>$objeto->estado,
            'proveedor'=>$objeto->proveedor
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='editarEstado'){
    $id_compra = $_POST['id_compra'];
    $id_estado = $_POST['id_estado'];
    $compras->editarEstado($id_compra,$id_estado);
    echo 'edit';
}
if($_POST['funcion']=='imprimir'){
    $id_compra = $_POST['id'];
    $compras->obtenerDatos($id_compra);
    foreach ($compras->objetos as $objetos) {
        $codigo=$objeto->codigo;
        $fecha_compra=$objeto->fecha_compra;
        $fecha_entrega=$objeto->fecha_entrega;
        $total=$objeto->total;
        $estado=$objeto->estado;
        $proveedor=$objeto->proveedor;
        $telefeno=$objeto->telefono;
        $correo=$objeto->correo;
        $direccion=$objeto->direccion;
        $avatar='../img/prov/'.$objeto->avatar;
    }
    $lote->ver($id_compra);
    /* $html = $html;
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $contenido = $dompdf->output();
    $nombreDelDocumento = "../pdf/pdf-compra-".$_POST['funcion'].".pdf";
    $bytes = file_put_contents($nombreDelDocumento, $contenido); */

}