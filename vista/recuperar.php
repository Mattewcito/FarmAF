<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FarmAf | Recuperar contraseña</title>

    <link rel="stylesheet" href="../css/css/all.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="../css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="../img/pngwing.com.png" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none; width: 70px;max-width: 70px;">
            <a href="login.php"><b>Farm</b>AF</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">¿Olvido su contraseña?</p>

                <span id="aviso1" class="text-success text-bold">Texto</span>
                <span id="aviso2" class="text-danger text-bold">Texto</span>
                <form id="form-recuperar" action="recover-password.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="dni" placeholder="DNI">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-address-card"style="color:#1c293A"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"style="color:#1c293A"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary btn-block">Enviar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="login-box-msg mt-3">Se le enviara un codigo a su correo</p>

                <p class="mt-3 mb-1">
                    <a href="login.php">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <script src="../js/recuperar.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>
</html>