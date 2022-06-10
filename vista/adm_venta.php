<?php
session_start();
if ($_SESSION['us_tipo'] == 1||$_SESSION['us_tipo']==2||$_SESSION['us_tipo']==3){
  include_once 'Comple/header.php';
?>
  <title>ADM | FarmAF</title>
  <?php
  include_once 'Comple/nav.php';
  ?>
  <div class="animate__animated animate__bounceInDown modal fade" id="vista_venta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A; color: #FFFFFF">
            <h3 class="card-title">buscar registros de ventas</h3>
            <button data-dismiss="modal" aria-label="close-class" class="close"style="color: #FFFFFF">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="codigo_venta">Codigo Venta: </label>
              <span id="codigo_venta"></span>
            </div>
            <div class="form-group">
              <label for="fecha">Fecha: </label>
              <span id="fecha"></span>
            </div>
            <div class="form-group">
              <label for="cliente">Cliente: </label>
              <span id="cliente"></span>
            </div>
            <div class="form-group">
              <label for="dni">DNI: </label>
              <span id="dni"></span>
            </div>
            <div class="form-group">
              <label for="vendedor">Vendedor: </label>
              <span id="vendedor"></span>
            </div>
            <table class="table table-hover text-nowrap">
              <thead class="table-success">
                <tr>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Producto</th>
                  <th>Concentracion</th>
                  <th>Adicional</th>
                  <th>Laboratorio</th>
                  <th>Presentacion</th>
                  <th>Tipo</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody class="table-warning" id="registros">

              </tbody>
            </table>
            <div class="float-right input-group-append">
              <h3 class="m-3">Total: </h3>
              <h3 class="m-3" id="total"></h3>
            </div>
          </div>
          <div class="card-footer">
            
            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CONTENIDO -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="animate__animated animate__backInDown  col-sm-6">
            <h1>Gestion ventas</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A">
            <h3 class="card-title">Consultas</h3>
          </div>
          <div class="animate__animated animate__zoomIn card-body">
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info"style="background: #1C293A!important">
                  <div class="inner">
                    <h3 id="venta_dia_vendedor">0</h3>
                    <p>Venta del dia por Vendedor</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success"style="background: #1C293A!important">
                  <div class="inner">
                    <h3 id="venta_diaria">0</h3>
                    <p>Venta total del dia</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                  </div>
                  <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning"style="background: #1C293A!important;color:#ffffff!important">
                  <div class="inner">
                    <h3 id="venta_mensual">0</h3>
                    <p>Venta Mensual</p>
                  </div>
                  <div class="icon">
                    <i class="far fa-calendar-alt"></i>
                  </div>
                  <a href="adm_mas_consultas.php" class="small-box-footer"style="color: #ffffff!important">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger"style="background: #1C293A!important">
                  <div class="inner">
                    <h3 id="venta_anual"></h3>
                    <p>Venta Anual</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-signal"></i>
                  </div>
                  <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary"style="background: #1C293A!important">
                  <div class="inner">
                    <h3 id="ganancia_mensual">0</h3>
                    <p>Ganancia Mensual</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                  </div>
                  <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A">
            <h3 class="card-title">Buscar ventas</h3>
            
          </div>
          <div class="card-body p-0 table-responsive">
            <table id="tabla_venta" class="display table table-hover text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>clientes</th>
                            <th>DNI</th>
                            <th>Total</th>
                            <th>Vendedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
          <div class="card-footer">

            </div>
        </div>
    </div>
    </section>
  </div>

  <!-- FIN DEL CONTENIDO -->

<?php
  include_once 'Comple/footer.php';
} else {
  header('Location: ../vista/login.php');
}
?>

<script src="../js/Venta.js"></script>