<?php
include '../modelo/Producto.php';
require_once ("../vendor/autoload.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Dompdf\Dompdf;
$producto =new Producto();
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre'];
    $concentracion = $_POST['concentracion'];
    $adicional = $_POST['adicional'];
    $precio = $_POST['precio'];
    $laboratorio = $_POST['laboratorio'];
    $tipo = $_POST['tipo'];
    $presentacion = $_POST['presentacion'];
    $avatar = 'prod_default.png';
    $producto->crear($nombre,$concentracion,$adicional,$precio,$laboratorio,$tipo,$presentacion,$avatar);
}
if($_POST['funcion']=='editar'){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $concentracion = $_POST['concentracion'];
    $adicional = $_POST['adicional'];
    $precio = $_POST['precio'];
    $laboratorio = $_POST['laboratorio'];
    $tipo = $_POST['tipo'];
    $presentacion = $_POST['presentacion'];
    $producto->editar($id,$nombre,$concentracion,$adicional,$precio,$laboratorio,$tipo,$presentacion);
}
if($_POST['funcion']=='buscar'){
    $producto->buscar();
    $json=array();
    foreach ($producto->objetos as $objeto) {
        $producto->obtener_stock($objeto->id_producto);
        foreach ($producto->objetos as $obj) {
            $total = $obj->total;
        }
        $json[]=array(
            'id'=>$objeto->id_producto,
            'nombre'=>$objeto->nombre,
            'concentracion'=>$objeto->concentracion,
            'adicional'=>$objeto->adicional,
            'precio'=>$objeto->precio,
            'stock'=>$total,
            'laboratorio'=>$objeto->laboratorio,
            'tipo'=>$objeto->tipo,
            'presentacion'=>$objeto->presentacion,
            'laboratorio_id'=>$objeto->prod_lab,
            'tipo_id'=>$objeto->prod_tip_prod,
            'presentacion_id'=>$objeto->prod_present,
            'avatar'=>'../img/prod/'.$objeto->avatar,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='cambiar_avatar'){
    $id=$_POST['id_logo_prod'];
    $avatar=$_POST['avatar'];
    if(($_FILES['photo']['type']='image/jpg')||($_FILES['photo']['type']='image/png')||($_FILES['photo']['type']='image/gif')||($_FILES['photo']['type']='image/jpeg')){
        $nombre=uniqid().'-'.$_FILES['photo']['name'];
        $ruta='../img/prod/'.$nombre;
        move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
        $producto->cambiar_logo($id,$nombre);
            if($avatar!='../img/prod/prod_default.png'){
                unlink($avatar);
            }
        
        $json=array();
        $json[]=array(
            'ruta'=>$ruta,
            'alert'=>'edit'
        );
        $jsonstring= json_encode($json[0]);
        echo $jsonstring;
    }
    else{
        $json=array();
        $json[]=array(
            'alert'=>'noedit'
        );
        $jsonstring= json_encode($json[0]);
        echo $jsonstring;
    }
}
if($_POST['funcion']=='borrar'){
    $id=$_POST['id'];
    $producto->borrar($id);
}
if($_POST['funcion']=='buscar_id'){
    $id=$_POST['id_producto'];
    $producto->buscar_id($id);
    $json=array();
    foreach ($producto->objetos as $objeto) {
        $producto->obtener_stock($objeto->id_producto);
        foreach ($producto->objetos as $obj) {
            $total = $obj->total;
        }
        $json[]=array(
            'id'=>$objeto->id_producto,
            'nombre'=>$objeto->nombre,
            'concentracion'=>$objeto->concentracion,
            'adicional'=>$objeto->adicional,
            'precio'=>$objeto->precio,
            'stock'=>$total,
            'laboratorio'=>$objeto->laboratorio,
            'tipo'=>$objeto->tipo,
            'presentacion'=>$objeto->presentacion,
            'laboratorio_id'=>$objeto->prod_lab,
            'tipo_id'=>$objeto->prod_tip_prod,
            'presentacion_id'=>$objeto->prod_present,
            'avatar'=>'../img/prod/'.$objeto->avatar,
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if($_POST['funcion']=='verificar_stock'){
    $error=0;
    $productos=json_decode($_POST['productos']);
    foreach ($productos as $objeto) {
        $producto->obtener_stock($objeto->id);
        foreach ($producto->objetos as $obj) {
            $total=$obj->total;
        }
        if ($total>=$objeto->cantidad && $objeto->cantidad>0) {
            $error=$error+0;
        }
        else{
            $error=$error+1;
        }
    }
    echo $error;
}
if($_POST['funcion']=='traer_productos'){
    $html="";
    $productos=json_decode($_POST['productos']);
    foreach ($productos as $resultado){
        $producto->buscar_id($resultado->id);
        foreach ($producto->objetos as $objeto) {
          if($resultado->cantidad==''){
            $resultadoCantidad=0;
          }else{
            $resultadoCantidad=$resultado->cantidad;
          }
            $subtotal=$objeto->precio*$resultadoCantidad;
            $producto->obtener_stock($objeto->id_producto);
            foreach ($producto->objetos as $obj) {
                $stock=$obj->total;
            }
            $html.="
            <tr prodId='$objeto->id_producto' prodPrecio='$objeto->precio'>
                    <td>$objeto->nombre</td>
                    <td>$stock</td>
                    <td class='precio'>$objeto->precio</td>
                    <td>$objeto->concentracion</td>
                    <td>$objeto->adicional</td>
                    <td>$objeto->laboratorio</td>
                    <td>$objeto->presentacion</td>
                    <td>
                        <input type='number' min='1' class='form-control cantidad_producto' value='$resultado->cantidad'> 
                    </td>
                    <td class='subtotales'>
                        <h5>$subtotal</h5>
                    </td>
                    <td><button class='borrar-producto btn btn-danger'><i class='fas fa-trash-alt'></i></button></td>
                </tr>
            ";
        }
    }
    echo $html;
}
if($_POST['funcion']=='reporte_producto'){
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i:s');
    $html = '
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
      font-size: 12px;
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
        <header>
            <div id="logo">
                <img src="..\img\pngwing.com.png">
            </div>
            <h1>REPORTE DE PRODUCTOS</h1>
            <div id="project">
                <div>
                    <span>Fecha y Hora: </span>'.$fecha.'
                </div>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Producto</th>
                    <th>Concentracion</th>
                    <th>Adicional</th>
                    <th>Laboratorio</th>
                    <th>Presentacion</th>
                    <th>Tipo</th>
                    <th>Stock</th>
                    <th>Precio</th>     
                </tr>   
            </thead>
            <tbody>';
    $producto->reporte_producto();
    $contador=0;
    foreach ($producto-> objetos as $objeto) {
        $contador++;
        $producto->obtener_stock($objeto->id_producto);
            foreach ($producto->objetos as $obj) {
                $stock=$obj->total;
            }
        $html.='
        <tr>         
            <td class="servic">'.$contador.'</td>
            <td class="servic">'.$objeto->nombre.'</td>
            <td class="servic">'.$objeto->concentracion.'</td>
            <td class="servic">'.$objeto->adicional.'</td>
            <td class="servic">'.$objeto->laboratorio.'</td>
            <td class="servic">'.$objeto->presentacion.'</td>
            <td class="servic">'.$objeto->tipo.'</td>
            <td class="servic">'.$stock.'</td>
            <td class="servic">'.$objeto->precio.'</td>
        </tr>
        ';
    }
    $html.='
        </tbody>
    </table>
    </body>
  </html>';
    $html = $html;
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $contenido = $dompdf->output();
    $nombreDelDocumento = "../pdf/pdf-".$_POST['funcion'].".pdf";
    $bytes = file_put_contents($nombreDelDocumento, $contenido); 
  }
  if($_POST['funcion']=='reporte_productoExcel'){
      $nombre_archivo = 'reporte_productos.xlsx';
      $producto->reporte_producto();
      $contador=0;
      foreach ($producto->objetos as $objeto){
        $contador++;
        $producto->obtener_stock($objeto->id_producto);
          foreach ($producto->objetos as $obj){
            $stock=$obj->total;
          }
          $json[]=array(
            'N'=>$contador,
            'nombre'=>$objeto->nombre,
            'concentracion'=>$objeto->concentracion,
            'adicional'=>$objeto->adicional,
            'laboratorio'=>$objeto->laboratorio,
            'presentacion'=>$objeto->presentacion,
            'tipo'=>$objeto->tipo,
            'stock'=>$stock,
            'precio'=>$objeto->precio 
        );
      }
      $spreadsheet = new Spreadsheet();
      $Sheet = $spreadsheet->getActiveSheet();
      $Sheet->setTitle('Reporte de productos');
      $Sheet->setCellValue('D1', 'Reporte de productos en Excel');
      $Sheet->getStyle('D1')->getFont()->setSize(17);
      $Sheet->fromArray(array_keys($json[0]),NULL,'A3');
      $Sheet->getStyle('A3:I3')
      ->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()
      ->setARGB('161a39');
      $Sheet->getStyle('A3:I3')
      ->getFont()->setSize(14)
      ->getColor()
      ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
      foreach ($json as $key => $producto) {
        $celda = (int)$key+5;
        if($producto['stock']==''){
          $Sheet->getStyle('A'.$celda. ':I'.$celda)
          ->getFont()->setSize(12)
          ->getColor()
          ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
        }
        $Sheet->setCellValue('A'.$celda,$producto['N']);
        $Sheet->setCellValue('B'.$celda,$producto['nombre']);
        $Sheet->setCellValue('C'.$celda,$producto['concentracion']);
        $Sheet->setCellValue('D'.$celda,$producto['adicional']);
        $Sheet->setCellValue('E'.$celda,$producto['laboratorio']);
        $Sheet->setCellValue('F'.$celda,$producto['presentacion']);
        $Sheet->setCellValue('G'.$celda,$producto['tipo']);
        $Sheet->setCellValue('H'.$celda,$producto['stock']);
        $Sheet->setCellValue('I'.$celda,$producto['precio']);
      }
      foreach (range ('B','I') as $col) {
        $Sheet->getColumnDimension($col)->setAutoSize(true);
      }
      $writer =IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('../Excel/'.$nombre_archivo);
    }
    if($_POST['funcion']=='llenar_productos'){
      $producto->llenar_productos();
      $json = array();
      foreach ($producto->objetos as $objeto) {
          $json[]=array(
              'nombre'=>$objeto->id_producto.' | '.$objeto->nombre.' | '.$objeto->concentracion.' | '.$objeto->adicional.' | '.$objeto->laboratorio.' | '.$objeto->presentacion
          ); 
      }
      $jsonstring = json_encode($json);
      echo $jsonstring;
  }
?>