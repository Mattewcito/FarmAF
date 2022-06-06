<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3||$_SESSION['us_tipo']==2){
  include_once 'Comple/header.php';
?>
<title>ADM | FarmAF</title>
<?php
include_once 'Comple/nav.php';
?>
<div class="modal fade" id="editarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card card-success">
          <div class="card-header" style="background: #1C293A; color: #FFFFFF">
              <h3 class="card-title">Editar cliente</h3>
              <button data-dismiss="modal" aria-label="close-class" class="close" style="color: #ffffff">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card-body">
              <div class="alert alert-success text-center" id="edit-cli" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se edito correctamente</span>
              </div>
              <div class="alert alert-danger text-center" id="noedit-cli" style='display:none;'>
                <span> <i class="fas fa-times m-1"></i>No se pudo editar</span>
              </div>
          <form id="form-editar">
              <div class="form-group">
                  <label for="telefono_edit">Telefono</label>
                  <input id="telefono_edit" type="number" class="form-control" placeholder="Ingrese el telefono" required>
              </div>
              <div class="form-group">
                  <label for="correo_edit">Correo</label>
                  <input id="correo_edit" type="email" class="form-control" placeholder="Ingrese el correo">
              </div>
              <input type="hidden" id="id_cliente">
          </div>
          <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary float-right m-1"style="background: #1C293A!important; color: #FFFFFF">Guardar</button>
              <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
          </form>
        </div>
      </div>
  </div>
  </div>
</div>

<div class="modal fade" id="crearcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card card-success">
          <div class="card-header"style="background: #1c293A">
              <h3 class="card-title">Crear cliente</h3>
              <button data-dismiss="modal" aria-label="close-class" class="close" style="color: #ffffff">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card-body">
              <div class="alert alert-success text-center" id="add-cli" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se agrego correctamente</span>
              </div>
              <div class="alert alert-danger text-center" id="noadd-cli" style='display:none;'>
                <span> <i class="fas fa-times m-1"></i>El cliente ya existe</span>
              </div>
          <form id="form-crear">
              <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
              </div>
              <div class="form-group">
                  <label for="apellido">Apellidos</label>
                  <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellido" required>
              </div>
              <div class="form-group">
                  <label for="dni">DNI</label>
                  <input id="dni" type="number" class="form-control" placeholder="Ingrese el dni" required>
              </div>
              <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input id="telefono" type="number" class="form-control" placeholder="Ingrese el telefono" required>
              </div>
              <div class="form-group">
                  <label for="correo">Correo</label>
                  <input id="correo" type="email" class="form-control" placeholder="Ingrese el correo">
              </div>
              <div class="form-group">
                  <label for="sexo">Sexo</label>
                  <input id="sexo" type="text" class="form-control" placeholder="Ingrese su sexo" required>
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
          <h1>Gestion cliente <button type="button" data-toggle="modal" data-target="#crearcliente" class="btn bg-gradient-primary ml-2">Crear cliente</button></h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
  <div class="container-fluid">
      <div class="card card-success">
          <div class="card-header" style="background: #1c293A">
              <h3 class="card-title">Buscar cliente</h3>
              <div class="input-group">
                  <input type="text" id="buscar_cliente" class="form-control float-left" placeholder="Ingrese nombre de cliente">
                  <div class="input-group-append">
                      <button class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <div id="clientes" class="row d-flex align-items-stretch"></div>
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
<script src="../js/Cliente.js"></script>