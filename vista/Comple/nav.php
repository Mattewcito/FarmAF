    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/pngwing.com.png" type="image/png">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/datatables.css">
    <link  rel="stylesheet" href="../css/compra.css">
    <link rel="stylesheet" href="../css/main.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <!-- TIPO DE LETRA:  Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->

  <link rel="stylesheet" href="../css/select2.css">
  <!-- SweetAlert2 -->

  <link rel="stylesheet" href="../css/sweetalert2.css">
  <!-- ICONOS -->

  <link rel="stylesheet" href="../css/css/all.min.css">
  
  <!-- ESTILOS Y TEMAS -->

  <link rel="stylesheet" href="../css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      
    <!-- NAVBAR SUPERIOR -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../vista/adm_catalogo.php" class="nav-link">Catalogo</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../vista/pag/Contacto.php" class="nav-link">Ayuda</a>
      </li>
      <li class="nav-item dropdown" id="cat-carrito" style="display:none">
          <img src="../img/carrito.png" class="imagen-carrito nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span id="contador" class="contador badge badge-danger"></span>
          </img>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <table class="carro table table-hover text-nowrap p-0">
              <thead class="table-success">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Concentracion</th>
                  <th>Adicional</th>
                  <th>Precio</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="lista">

                </tbody>
            </table>
            <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar compra</a>
            <a href="#" id="vaciar-carrito"class="btn btn-primary btn-block">Vaciar carrito</a>

          </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- NOTIFICACIONES-->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">1 Alertas</span>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 1 Alerta Nueva
            <span class="float-right text-muted text-sm">2 dias</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas notificaciones</a>
        </div>
      </li>
        <a href="../controlador/logout.php">cerrar sessión</a>
    </ul>
  </nav>

  <!-- FIN NAVBAR SUPERIOR -->

  <!-- NAVBAR IZQUIERDO -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../vista/adm_catalogo.php" class="brand-link">
      <img src="../img/pngwing.com.png" alt="FarmAF Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Farmacia</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar4" src="../img/cargando.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../vista/editar_datos_personales.php" class="d-block">
            <?php
                echo $_SESSION['nombre_us'];
            ?>
          </a>
        </div>
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <div class="input-group-append">
          </div>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Usuarios</li>
          <li class="nav-item">
            <a href="editar_datos_personales.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Datos personales
              </p>
            </a>
          </li>
          <li id="gestion_usuario" class="nav-item">
            <a href="adm_usuario.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion usuario
              </p>
            </a>
          </li>
          <li id="gestion_usuario" class="nav-item">
            <a href="adm_cliente.php" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Gestion Cliente
              </p>
            </a>
          </li>
          <li class="nav-header">Ventas</li>
          <li class="nav-item">
            <a href="adm_venta.php" class="nav-link">
              <i class="nav-icon fas fa-notes-medical"></i>
              <p>
                Listar ventas
              </p>
            </a>
          </li>
          <li class="nav-header">Almacen</li>
          <li id="gestion_producto" class="nav-item">
            <a href="adm_producto.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Gestion producto
              </p>
            </a>
          </li>
          <li id="gestion_atributo"class="nav-item">
            <a href="adm_atributo.php" class="nav-link">
              <i class="nav-icon fas fa-vials"></i>
              <p>
                Gestion atributo
              </p>
            </a>
          </li>
          <li id="gestion_lote" class="nav-item">
            <a href="adm_lote.php" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Gestion lote
              </p>
            </a>
          </li>
          <li class="nav-header">Compras</li>
          <li id="gestion_proveedor" class="nav-item">
            <a href="adm_proveedor.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Gestion proveedor
              </p>
            </a>
          </li>
          <li id="gestion_compra" class="nav-item">
            <a href="adm_compras.php" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                Gestion compras
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

<!-- FIN NAVBAR IZQUIERDO-->
