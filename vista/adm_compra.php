<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==2||$_SESSION['us_tipo']==3){
  include_once 'Comple/header.php';
?>
  <title>ADM | FarmAF</title>
<?php
include_once 'Comple/nav.php';
?> 

  <!-- CONTENIDO -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compra</h1>
          </div>
        </div>
      </div>
    </section>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header"style="background: #1C293A;color:#ffffff">
                    </div>
                    <div class="card-body p-0">
                        <header>
                            <div class="logo_cp">
                                <img src="../img/pngwing.com.png" width="100" height="210">
                            </div>
                            <h1 class="titulo_cp"style="border:1px solid #1C293A">SOLICITUD DE COMPRA</h1>
                            <div class="datos_cp">
                                <div class="form-group row">
                                    <span style="color: #1C293A">Cliente: </span>
                                    <div class="input-group-append col-md-6">
                                        <select id="cliente" class="form-control select2" style="color: #1c293A!important; width:100%"></select>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <span style="color:#1C293A">Vendedor: </span>
                                    <h3 class="col-md-6"style="color: #1C293A"><?php echo $_SESSION["nombre_us"];?></h3>
                                </div>
                            </div>
                        </header>
                        <button id="actualizar"class="btn btn-secondary">Actualizar</button>
                        <div id="cp"class="card-body p-0">
                            <table class="compra table table-hover text-nowrap">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Concentracion</th>
                                        <th scope="col">Adicional</th>
                                        <th scope="col">Laboratorio</th>
                                        <th scope="col">Presentacion</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="lista-compra" class='table-active'>
                                    
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-dollar-sign"></i>
                                            Calculo 1
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="info-box mb-3 bg-success p-0" >
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">SUB TOTAL</span>
                                                    <span class="info-box-number" id="subtotal">10</span>
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-success">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">IVA</span>
                                                    <span class="info-box-number"id="con_iva">2</span>
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-success">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">SIN DESCUENTO</span>
                                                    <span class="info-box-number" id="total_sin_descuento">12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-bullhorn"></i>
                                            Calculo 2
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="info-box mb-3 bg-success">
                                                <span class="info-box-icon"><i class="fas fa-comment-dollar"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">DESCUENTO</span>
                                                    <input id="descuento"type="number" min="1" placeholder="Ingrese descuento" class="form-control">
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-success">
                                                <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">TOTAL</span>
                                                    <span class="info-box-number" id="total">12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-cash-register"></i>
                                            Cambio
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                        <div class="info-box mb-3 bg-success">
                                            <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-left ">INGRESO</span>
                                                <input type="number" id="pago" min="1" placeholder="Ingresa Dinero" class="form-control">
                                               
                                            </div>
                                        </div>
                                        <div class="info-box mb-3 bg-success">
                                            <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-left ">VUELTO</span>
                                                <span class="info-box-number" id="vuelto">3</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="../vista/adm_catalogo.php" class="btn btn-secondary btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a href="#" class="btn btn-secondary btn-block" id="procesar-compra">Realizar compra</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  </div>

<!-- FIN DEL CONTENIDO -->

<?php
include_once 'Comple/footer.php';
}
else {
    header('Location: ../vista/login.php');
}
?>
<script src="../js/Carrito.js"></script>
