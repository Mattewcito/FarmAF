<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
  include_once 'Comple/header.php';
?>
<title>ADM | FarmAF</title>
<?php
include_once 'Comple/nav.php';
?>
<div class="animate__animated animate__bounceInDown modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Accion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="avatar3" src="../img/6293d5491bca9-1001145148 FOTO BRAYAN ZAPATA.jpg" class="profile-user-img img-fluid img-circle">
          <div class="text-center">
            <b>
              <?php
            echo $_SESSION['nombre_us'];
            ?>
            </b>
          </div>
          <span>Necesitamos tu contraseña para continuar</span>
          <div class="alert alert-success text-center" id="confirmado" style='display:none;'>
            <span> <i class="fas fa-check m-1"></i>Se modifico correctamente el usuario</span>
          </div>
          <div class="alert alert-danger text-center" id="rechazado" style='display:none;'>
            <span> <i class="fas fa-times m-1"></i>La contraseña no es correcta</span>
          </div>
          <form id="form-confirmar">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input id="oldpass" type="password" class="form-control" placeholder="Contraseña actual">
              <input type="hidden" id="id_user">
              <input type="hidden" id="funcion">
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
<div class="animate__animated animate__bounceInDown modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card card-success">
          <div class="card-header"style="background: #1C293A; color: #FFFFFF">
              <h3 class="card-title">Crear usuario</h3>
              <button data-dismiss="modal" aria-label="close-class" class="close"style=" color: #FFFFFF">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card-body">
              <div class="alert alert-success text-center" id="add" style='display:none;'>
                <span> <i class="fas fa-check m-1"></i>Se agrego correctamente</span>
              </div>
              <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
                <span> <i class="fas fa-times m-1"></i>El DNI ya existe</span>
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
                  <label for="edad">Nacimiento</label>
                  <input id="edad" type="date" class="form-control" placeholder="Ingrese fecha de nacimiento" required>
              </div>
              <div class="form-group">
                  <label for="dni">DNI</label>
                  <input id="dni" type="text" class="form-control" placeholder="Ingrese DNI" required>
              </div>
              <div class="form-group">
                  <label for="pass">Password</label>
                  <input id="pass" type="password" class="form-control" placeholder="Ingrese contraseña" required>
              </div>
          </div>
          <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary float-right m-1"style="background: #1C293A!important; color: #FFFFFF; border: 0px">Guardar</button>
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
          <h1>Gestion usuarios <button style="background: #1C293A!important; color: #FFFFFF" id="button-crear" type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-2">Crear usuario</button></h1>
          <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo'] ?>">
        </div>
      </div>
    </div>
  </section>
  <section class="content">
  <div class="container-fluid">
      <div class="card card-success">
          <div class="card-header"style="background: #1C293A; color: #FFFFFF">
              <h3 class="card-title">Buscar usuarios</h3>
              <div class="input-group">
                  <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de usuario">
                  <div class="input-group-append">
                      <button class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
              </div>
          </div>
          <div class="animate__animated animate__zoomIn card-body">
              <div id="usuarios" class="row d-flex align-items-stretch"></div>
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
<script src="../js/Gestion_usuario.js"></script>