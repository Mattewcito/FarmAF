<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
  include_once 'Comple/header.php';
?>
<title>ADM | FarmAF</title>
<?php
include_once 'Comple/nav.php';
?>
<div class="modal fade" id="cambiologo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"style="background: #1C293A;color:#ffffff">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"style="color:#ffffff">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="logoactual" src="../img/avatar2.jpg" class="profile-user-img img-fluid img-circle">
          <div class="text-center">
            <b id="nombre_logo">
            </b>
          </div>
          <div class="alert alert-success text-center" id="edit-prov" style='display:none;'>
            <span> <i class="fas fa-check m-1"></i>El logo se cambio</span>
          </div>
          <div class="alert alert-danger text-center" id="noedit-prov" style='display:none;'>
            <span> <i class="fas fa-times m-1"></i>Formato no permitido, intente con (jpeg,png,gif,jpg)</span>
          </div>
          <form id="form-logo" entype="multipart/form-data">
            <div class="input-group mb-3 ml-5 mt-2">
              <input type="file" name="photo" class="input-group"style="background: #1C293A;color:#ffffff;width:auto">
              <input type="hidden" name="funcion" id="funcion">
              <input type="hidden" name="id_logo_prov" id="id_logo_prov">
              <input type="hidden" name="avatar" id="avatar">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="crearproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
              <h3 class="card-title">Crear proveedor</h3>
              <button data-dismiss="modal" aria-label="close-class" class="close"style="color:#ffffff">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card-body">
              <div class="alert alert-success text-center" id="add-prov" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se agrego correctamente</span>
              </div>
              <div class="alert alert-danger text-center" id="noadd-prov" style='display:none;'>
                <span> <i class="fas fa-times m-1"></i>El proveedor ya existe</span>
              </div>
              <div class="alert alert-success text-center" id="edit-prove" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se modifico correctamente</span>
              </div>
          <form id="form-crear">
              <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
              </div>
              <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input id="telefono" type="number" class="form-control" placeholder="Ingrese telefono" required>
              </div>
              <div class="form-group">
                  <label for="correo">Correo</label>
                  <input id="correo" type="email" class="form-control" placeholder="Ingrese correo">
              </div>
              <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input id="direccion" type="text" class="form-control" placeholder="Ingrese direccion" required>
              </div>
              <input type="hidden" id="id_edit_prov">
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
        <div class="col-sm-6">
          <h1>Gestion proveedores <button type="button" data-toggle="modal" data-target="#crearproveedor" class="btn bg-gradient-primary ml-2">Crear proveedor</button></h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
  <div class="container-fluid">
      <div class="card card-success">
          <div class="card-header"style="background: #1C293A;color:#ffffff">
              <h3 class="card-title">Buscar proveedor</h3>
              <div class="input-group">
                  <input type="text" id="buscar_proveedor" class="form-control float-left" placeholder="Ingrese nombre de proveedor">
                  <div class="input-group-append">
                      <button class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <div id="proveedores" class="row d-flex align-items-stretch"></div>
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
<script src="../js/Proveedor.js"></script>