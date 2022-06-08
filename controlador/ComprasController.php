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
    foreach ($compras->objetos as $objeto) {
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
    $plantilla = '
    <!DOCTYPE>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <style type="text/css">
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
    
    a {
      color: #5D6975;
      text-decoration: underline;
    }
    
    table thead tr {
      height: 80px;
      background: #1C293A;
    }
    body {
      position: relative;
      width: 18cm;  
      height: 29.7cm; 
      margin: 0 auto; 
      color: #121b25;
      background: #FFFFFF; 
      font-family: Arial, sans-serif; 
      font-size: 13px; 
      font-family: Arial;
    }
    
    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }
    
    #logo {
      text-align: center;
      margin-bottom: 10px;
      margin-top: 5px;
      margin-left:30px ;
      margin-right: 40px;
      
    }
    
    #logo img {
      width: 100px;
      height: 80px;
      border: 1px solid #000000;
      -moz-border-radius: 7px;
      -webkit-border-radius: 7px;
      padding: 10px;
    }
    
    h1 {
      border-top: 1px solid  rgb(2,0,36);
      border-bottom: 1px solid rgb(2,0,36);
      color: rgb(2,0,36); 
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(../img/dimension.png);
    }
    
    #project {
      float: left;
      color: #000000;
    }
    
    #project span {
      color: rgb(2,0,36);
      text-align: left;
      width: 64px;
      margin-right: 10px;
      display: inline-block;
      font-size: 16px;
    }
    
    #company {
      float: right;
      text-align: right;
      
    }
    
    #project div{
      font-size: 16px;    
    }
    #company div {
      white-space: nowrap;    
      
    }
    #negocio {
      font-size: 18px;
      color: rgb(2,0,36);
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 30px;
    }
    
    table tr:nth-child(2n-1) td {
      background: rgb(227, 220, 230);
    }
    
    table th,
    table td {
      text-align: center;
    }
    
    table th {
      padding: 5px 5px;
      color: rgb(255, 255, 255);
      border-bottom: 1px solid rgb(2,0,36);
      white-space: nowrap;        
      font-weight: normal;
      font-size: 15px;
    }
    
    table .service {
      text-align: left;
    }
    table td.service{
      vertical-align: top;
    }
    table .servic {
      text-align: left;
    }
    table td.servic{
      vertical-align: top;
    }
    table td {
      font-size: 9px;
      padding: 10px;
      text-align: right;
    }
    
    table td.total {
      font-size: 15px;
      color : rgb(2,0,36);
    }
    
    table td.grand {
      border-top: 1px solid  rgb(2,0,36);
      
    }
    
    #notices .notice {
      color: rgb(2,0,36);
      font-size: 1.2em;
    }
    
    footer {
      color: #5D6975;
      width: 100%;
      height: 100px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
    </style>
    </head>
    <body>
    <header class="clearfix">
      <div id="logo">
        <img src="'.$avatar.'" width="60" height="60">
      </div>
      <h1>COMPRA N. '.$codigo.'</h1>
      <div id="company" class="clearfix">
        <div id="negocio">'.$proveedor.'</div>
        <div>'.$direccion.'</div>
        <div>'.$telefeno.'</div>
        <div><a href="laasuncion@gmail.com">'.$correo.'</a></div>
      </div>';
      $plantilla.='

      <div id="project">
        <div><span>Codigo de compra: </span>'.$codigo.'</div>
        <div><span>Fecha de compra: </span>'.$fecha_compra.'</div>
        <div><span>Fecha de entrega: </span>'.$fecha_entrega.'</div>
        <div><span>Estado: </span>'.$estado.'</div>
      </div>';

    $plantilla.='
    </header>
    <main>
      <table>
        <thead>
          <tr>
            
            <th class="service">#</th>
            <th class="service">Codigo</th>
            <th class="service">Cantidad</th>
            <th class="service">Vencimiento</th>
            <th class="service">Precio de compra</th>
            <th class="service">Producto</th>
            <th class="service">Laboratorio</th>
            <th class="service">Presentacion</th>
            <th class="service">Tipo</th>     
          </tr>   
        </thead>
        <tbody>';
        foreach ($lote->objetos as $objeto) {
        
          $plantilla.='<tr>         
          
          <td class="servic">'.$objeto->producto.'</td>
          <td class="servic">'.$objeto->codigo.'</td>
          <td class="servic">'.$objeto->cantidad.'</td>
          <td class="servic">'.$objeto->vencimiento.'</td>
          <td class="servic">'.$objeto->precio_compra.'</td>
          <td class="servic">'.$objeto->producto.'|'.$objeto->concentracion.'|'.$objeto->adicional.'</td>
          <td class="servic">'.$objeto->laboratorio.'</td>
          <td class="servic">'.$objeto->presentacion.'</td>
          <td class="servic">'.$objeto->tipo.'</td>
        </tr>';
      }

        $iva=$total*0.19;
        $sub=$total-$iva;

        $plantilla.='
        <tr>
          <td colspan="8" class="grand total">SUBTOTAL</td>
          <td class="grand total">S/.'.$sub.'</td>
        </tr>
        <tr>
          <td colspan="8" class="grand total">IVA(19%)</td>
          <td class="grand total">S/.'.$iva.'</td>
        </tr>
        <tr>
          <td colspan="8" class="grand total">TOTAL</td>
          <td class="grand total">S/.'.$total.'</td>
        </tr>';
    
    
      $plantilla.='
        </tbody>
      </table>
      <div id="notices">
        <div>NOTAS:</div>
        <div class="notice"></div>
    
      </div>
    </main>
    <footer>
        Created by FarmAF.
    </footer>
  </body>
  </html>';
  $plantilla = $plantilla;
  $dompdf = new Dompdf();
  $dompdf->loadHtml($plantilla);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();
  $contenido = $dompdf->output();
  $nombreDelDocumento = "../pdf/pdf-compra".$id_compra.".pdf";
  $bytes = file_put_contents($nombreDelDocumento, $contenido);
}