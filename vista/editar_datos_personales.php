  <?php
  session_start();
  if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==2||$_SESSION['us_tipo']==3){
    include_once 'Comple/header.php';
  ?>
  <title>ADM | FarmAF</title>
  <?php
  include_once 'Comple/nav.php';
  ?>

<!-- Modal -->
<div class="animate__animated animate__bounceInDown modal fade" id="cambiocontra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="avatar3" src="../img/default.png" class="profile-user-img img-fluid img-circle"style="border: 3px  solid #1C293A">
          <div class="text-center">
            <b>
              <?php
            echo $_SESSION['nombre_us'];
            ?>
            </b>
          </div>
          <div class="alert alert-success text-center" id="update" style='display:none;'>
            <span> <i class="fas fa-check m-1"></i>Se guardo con exito</span>
          </div>
          <div class="alert alert-danger text-center" id="noupdate" style='display:none;'>
            <span> <i class="fas fa-times m-1"></i>La contraseña no es correcta</span>
          </div>
          <form id="form-pass">
            <dib class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input id="oldpass" type="password" class="form-control" placeholder="Contraseña actual">
            </dib>
            <dib class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input id="newpass" type="text" class="form-control" placeholder="Contraseña nueva">
            </dib>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary"style="background: #1C293A!important; color:#FFFFFF">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="animate__animated animate__bounceInDown modal fade modal fade" id="cambiophoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #1C293A">Cambio de avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="avatar2" src="../img/default.png" class="profile-user-img img-fluid img-circle" style="border: 3px  solid #1C293A">
          <div class="text-center">
            <b>
              <?php
            echo $_SESSION['nombre_us'];
            ?>
            </b>
          </div>
          <div class="alert alert-success text-center" id="edit" style='display:none;'>
            <span> <i class="fas fa-check m-1"></i>Se cambio la foto</span>
          </div>
          <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
            <span> <i class="fas fa-times m-1"></i>Formato no permitido, intente con (jpeg,png,gif,jpg)</span>
          </div>
          <form id="form-photo" entype="multipart/form-data">
            <div class="input-group mb-3 ml-5 mt-2">
              <input type="file" name="photo" class="input-group" style="background-color: #1C293A; color:#FFFFFF; width:auto">
              <input type="hidden" name="funcion" value="cambiar_foto">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary"style="background: #1C293A!important; color:#FFFFFF">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- CONTENIDO -->
  <div class="content-wrapper">
    <section class="content-header" >
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="animate__animated animate__backInDown col-sm-6">
            <h1>Editar datos personales</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-success card-outline"style="border-top:3px solid #1C293A">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img id="avatar1" src="../img/default.png" class="profile-user-img img-fluid img-circle"style="border: 3px  solid #1C293A">
                </div>
                <div class="text-center mt-1">
                <button data-toggle="modal" data-target="#cambiophoto" type="button" class="btn btn-primary btn-sm" style="background: #1C293A;
                color: #FFFFFF; border:0px">Cambiar foto</button>
                </div>
                <input id="id_usuario"type="hidden" value="<?php echo $_SESSION['usuario'] ?>">
                <h3 id="nombre_us" class="profile-username text-center text-success"style="color: #1C293A!important;">Nombre</h3>
                <p id= "apellidos_us" class="text-muted text-center"style="color: #1C293A!important;">Apellidos</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b style="color:#1C293A">Edad</b>
                    <a id="edad" class="float-right"style="color: #1C293A !important;">12</a>
                  </li>
                  <li class="list-group-item">
                    <b style="color:#1C293A">DNI</b>
                    <a id="dni_us" class="float-right"style="color: #1C293A !important;">12</a>
                  </li>
                  <li class="list-group-item">
                    <b style="color:#1C293A">Tipo de usuario</b>
                    <span id="us_tipo" class=" float-right">Administrador</span>
                  </li>
                  <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar contraseña</button>
                </ul>
              </div>
            </div>

            <div class="card card-success">
              <div class="card-header"style="background: #1C293A">
                <h3 class="card-title">Sobre mi</h3>
              </div>
              <div class="card-body">
                <strong style="color:#1C293A">
                  <i class="fas fa-phone mr-1"></i>Telefono
                </strong>
                <p id="telefono_us" class="text-muted">123456789</p>
                <strong style="color:#1C293A">
                  <i class="fas fa-map-marker-alt mr-1"></i>Dirección
                </strong>
                <p id="residencia_us" class="text-muted">Cr x # 00 - 00</p>
                <strong style="color:#1C293A">
                  <i class="fas fa-at mr-1"></i>Correo
                </strong>
                <p id="correo_us" class="text-muted"> </p>
                <strong style="color:#1C293A">
                  <i class="fas fa-pencil-alt mr-1"></i>sexo
                </strong>
                <p id="sexo_us" class="text-muted">Masculino</p>
                <strong style="color:#1C293A">
                <i class="fas fa-pencil-alt mr-1"></i>Informacion adicional
                </strong>
                <p id="adicional_us" class="text-muted">425698771</p>
                <button class="edit btn btn-block "style="background: #1C293A; color:#FFFFFF">Editar</button>
              </div>
              <div class="card-footer">
                <p class="text-muted">Click en el boton si desea editar</p>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card card-success">
              <div class="card-header"style="background: #1C293A">
                <h3 class="card-title">Editar datos personales</h3>
              </div>
              <div class="card-body">
                <div class="alert alert-success text-center" id="editado" style='display:none;' >
                <span> <i class="fas fa-check m-1"></i>Editado</span>
                </div>
                <div class="alert alert-danger text-center" id="noeditado" style='display:none;' >
                <span> <i class="fas fa-times m-1"></i>Edicion desabilitada</span>
                </div>
                <form id="form-usuario"class="form-horizontal">
                  <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                    <div class="col-sm-10">
                      <input type="number" id="telefono" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="residencia" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-10">
                      <input type="text" id="residencia" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="text" id="correo" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                    <div class="col-sm-10">
                      <input type="text" id="sexo" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="adicional" class="col-sm-2 col-form-label">Informacion adicional</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="adicional" cols="30" rows="10"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10 float-right">
                        <button class="btn btn-block btn-outline-success">Guardar</button>
                      </div>
                    </div>
                </form>
              </div>
              <div class="card-footer">
                <p class="text-muted">Cuidado con poner datos erroneos</p>
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
  <script src="../js/Usuario.js"></script>