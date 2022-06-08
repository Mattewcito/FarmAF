<?php
session_start();
if ($_SESSION['us_tipo'] == 3||$_SESSION['us_tipo'] == 1) {
  include_once 'Comple/header.php';
?>
  <title>ADM | FarmAF</title>
  <?php
  include_once 'Comple/nav.php';
  ?>
  <div class="animate__animated animate__bounceInDown modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
              <h3 class="card-title">Cambiar estado</h3>
              <button data-dismiss="modal" aria-label="close-class" class="close"style="background: #1C293A;color:#ffffff">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card-body">
              <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
                <span> <i class="fas fa-times m-1"></i>No se pudo editar</span>
              </div>
              <div class="alert alert-success text-center" id="edit" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se cambio el estado</span>
              </div>
          <form id="form-editar">
              <div class="form-group">
                  <label for="estado_compra">Estado</label>
                  <select id="estado_compra" class="form-control select2" style="width: 100%"></select>
                  <input type="hidden" id="id_compra">
              </div>
          </div>
          <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
              <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
          </form>
        </div>
      </div>
  </div>
  </div>
</div>
<div class="animate__animated animate__bounceInDown modal fade" id="vista_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
            <h3 class="card-title">Detalle compra</h3>
            <button data-dismiss="modal" aria-label="close-class" class="close"style="color:#ffffff">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="codigo_compra">Codigo compra: </label>
              <span id="codigo_compra"></span>
            </div>
            <div class="form-group">
              <label for="fecha_compra">Fecha compra: </label>
              <span id="fecha_compra"></span>
            </div>
            <div class="form-group">
              <label for="fecha_entrega">Fecha entrega: </label>
              <span id="fecha_entrega"></span>
            </div>
            <div class="form-group">
              <label for="estado">Estado: </label>
              <span id="estado"></span>
            </div>
            <div class="form-group">
              <label for="proveedor">Proveedor: </label>
              <span id="proveedor"></span>
            </div>
            <table class="table table-hover text-nowrap table-responsive">
              <thead class="table"style="background: #1C293A;color:#ffffff">
                <tr>
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Cantidad</th>
                  <th>Vencimiento</th>
                  <th>Precio compra</th>
                  <th>Producto</th>
                  <th>Laboratorio</th>
                  <th>Presentacion</th>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tbody class="table-warning" id="detalles">

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
          <div class="animate__animated animate__backInDown col-sm-6">
            <h1>Gestion compras<a href="adm_ingresar_compra.php" class="btn bg-gradient-primary ml-2">Crear compra</a></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
        <div class="card-header"style="background: #1C293A">
            <h3 class="card-title">Buscar compras</h3>
          </div>
            </div>
          </div>
          <div class="animate__animated  animate__bounceInDown card-body p-0 table-responsive">
           <table id="compras" class="table table table-hover text-nowrap" style="width:100%">
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