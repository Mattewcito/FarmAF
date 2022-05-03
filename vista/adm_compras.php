<?php
session_start();
if ($_SESSION['us_tipo'] == 3) {
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
            <h1>Gestion compras<a href="adm_ingresar_compra.php" class="btn bg-gradient-primary ml-2">Crear compra</a></h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion compras</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Buscar compras</h3>
            <div class="input-group">
              <input type="text" id="buscar-lote" class="form-control float-left" placeholder="Ingrese nombre de una compra">
              <div class="input-group-append">
                <button class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="card-body">
           <table id="compras" class="table table-dark table-hover">
             <thead>
               <tr>
                 <th>#</th>
                 <th>ID | Codigo</th>
                 <th>Fecha de compra</th>
                 <th>Fecha de entrega</th>
                 <th>Total</th>
                 <th>Estado</th>
                 <th>Proveedor</th>
                 <th>Operaciones</th>
               </tr>
             </thead>
             <tbody></tbody>
           </table>
          </div>
          <div class="card-footer"></div>
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
<script src="../js/Compras.js"></script>