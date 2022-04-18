<?php
include_once 'Venta.php';
include_once 'VentaProducto.php';
include_once ("../vendor/autoload.php");
include_once ("../modelo/Pdf.php");
function getHtml($id_venta){
    $venta = new Venta();
    $venta_producto=new VentaProducto();
    $venta->buscar_id($id_venta);
    $venta_producto->ver($id_venta);
    $plantilla='
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
      background: rgb(105, 102, 102);
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
    <header class="clearfix">
      <div id="logo">
        <img src="..\img\pngwing.com.png">
      </div>
      <h1>COMPROBANTE DE PAGO</h1>
      <div id="company" class="clearfix">
        <div id="negocio">Farmacia LA ASUNCION</div>
        <div>Direccion Cl 44DD # 99A 107-123B,<br /> Ciudad, Medellín</div>
        <div>(344) 342234</div>
        <div><a href="mailto:company@example.com">laasuncion@gmail.com</a></div>
      </div>';
      foreach ($venta->objetos as $objeto) {
    
      $plantilla.='
    
      <div id="project">
        <div><span>Codigo de Venta: </span>'.$objeto->id_venta.'</div>
        <div><span>Cliente: </span>'.$objeto->cliente.'</div>
        <div><span>DNI: </span>'.$objeto->dni.'</div>
        <div><span>Fecha y Hora: </span>'.$objeto->fecha.'</div>
        <div><span>Vendedor: </span>'.$objeto->vendedor.'</div>
      </div>';
      }
    $plantilla.='
    </header>
    <main>
      <table>
        <thead>
          <tr>
           
            <th class="service">Producto</th>
            <th class="service">Concentracion</th>
            <th class="service">Adicional</th>
            <th class="service">Laboratorio</th>
            <th class="service">Presentacion</th>
            <th class="service">Tipo</th>
            <th class="service">Cantidad</th>
            <th class="service">Precio</th>
            <th class="service">Subtotal</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($venta_producto->objetos as $objeto) {
         
          $plantilla.='<tr>
            
            <td class="servic">'.$objeto->producto.'</td>
            <td class="servic">'.$objeto->concentracion.'</td>
            <td class="servic">'.$objeto->adicional.'</td>
            <td class="servic">'.$objeto->laboratorio.'</td>
            <td class="servic">'.$objeto->presentacion.'</td>
            <td class="servic">'.$objeto->tipo.'</td>
            <td class="servic">'.$objeto->cantidad.'</td>
            <td class="servic">'.$objeto->precio.'</td>
            <td class="servic">'.$objeto->subtotal.'</td>
          </tr>';
        }
        $calculos= new Venta();
        $calculos->buscar_id($id_venta);
        foreach ($calculos->objetos as $objeto) {
          $iva=$objeto->total*0.19;
          $sub=$objeto->total-$iva;
          
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
            <td class="grand total">S/.'.$objeto->total.'</td>
          </tr>';

        }
       $plantilla.='
        </tbody>
      </table>
      <div id="notices">
        <div>NOTAS:</div>
        <div class="notice">*Presentar este comprobante de pago para cualquier reclamo o devolucion.</div>
        <div class="notice">*El reclamo procedera dentro de las 24 horas de haber hecho la compra.</div>
        <div class="notice">*Si el producto esta dañado o abierto, la devolucion no procedera.</div>
        <div class="notice">*Revise su cambio antes de salir del establecimiento.</div>
      </div>
    </main>
    <footer>
      Created by FarmAF.
    </footer>
  </body>
  </html>';
  return $plantilla;
  
}
?>