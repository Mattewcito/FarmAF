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
            <h1 class="animate__animated animate__backInDown">Catalogo</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Lotes en riesgos</h3>
            </div>
          </div>
          <div class="animate__animated  animate__bounceInDown card-body p-0 table-responsive">
            <table id="lotes" class="table table-hover text-nowrap">
              <thead class="table" > 
                <tr>
                  <th>Cod</th>
                  <th>Producto</th>
                  <th>Stock</th>
                  <th>Estado</th>
                  <th>Laboratorio</th>
                  <th>Presentacion</th>
                  <th>Proveedor</th>
                  <th>Mes</th>
                  <th>Dia</th>
                  <th>Hora</th>
                </tr>
              </thead>
              <tbody  class="table-active">

              </tbody>
            </table>
          </div>
          <div class="card-footer">
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A">
            <h3 class="card-title">Buscar producto</h3>
            <div class="input-group">
              <input type="text" id="buscar-producto" class="form-control float-left" placeholder="Ingrese nombre de producto">
              <div class="input-group-append">
                <button class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="animate__animated animate__zoomIn card-body">
            <div id="productos" class="row d-flex align-items-stretch"></div>
          </div>
          <div class="card-footer"></div>
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
<script src="../js/Catalogo.js"></script>
<script src="../js/Carrito.js"></script>
