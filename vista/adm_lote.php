<?php
session_start();
if ($_SESSION['us_tipo'] == 3) {
  include_once 'Comple/header.php';
?>
  <title>ADM | FarmAF</title>
  <?php
  include_once 'Comple/nav.php';
  ?>
    <div class="animate__animated animate__bounceInDown modal fade" id="editarlote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
            <h3 class="card-title">Editar lote</h3>
            <button data-dismiss="modal" aria-label="close-class" class="close"style="color:#ffffff">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <div class="alert alert-success text-center" id="add-lote" style='display:none;'>
              <span> <i class="fas fa-check m-1"></i>Se modifico correctamente</span>
            </div>
            <form id="form-editar-lote">
            <div class="form-group">
                <label for="codigo_lote">Codigo lote: </label>
                <label id="codigo_lote">Codigo lote</label>
              </div>
              <div class="form-group">
                <label for="stock">Stock: </label>
                <input id="stock" type="number" class="form-control" placeholder="Ingrese stock">
              </div>
              <input type="hidden" id="id_lote_prod">
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
  <!-- CONTENIDO -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="animate__animated animate__backInDown col-sm-6">
            <h1>Gestion lote</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
            <h3 class="card-title">Buscar lotes</h3>
            <div class="input-group">
              <input type="text" id="buscar-lote" class="form-control float-left" placeholder="Ingrese nombre de producto">
              <div class="input-group-append">
                <button class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="animate__animated animate__zoomIn card-body">
            <div id="lotes" class="row d-flex align-items-stretch"></div>
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
<script src="../js/Lote.js"></script>