<!-- FOOTER -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2022 <a href="">FarmAF</a>.</strong> Todos los derechos reservados.
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="../JS/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="../js/sweetalert2.js"></script>
<!-- Select2 -->
<script src="../js/select2.js"></script>
<script src="../js/datatables.js"></script>
</body>
<script>
  let funcion = 'devolver_avatar';
  $.post('../controlador/UsuarioController.php',{funcion},(response)=>{
    const avatar = JSON.parse(response);
    $('#avatar4').attr('src','../img/'+avatar.avatar);
  })
  funcion='tipo_usuario';
  $.post('../controlador/UsuarioController.php',{funcion},(response)=>{
    if(response==1){
      $('#gestion_lote').hide();
    }
    else if (response==2){
      $('#gestion_lote').hide();
      $('#gestion_usuario').hide();
      $('#gestion_producto').hide();
      $('#gestion_atributo').hide();
      $('#gestion_proveedor').hide();
    }
  })
</script>
</html>