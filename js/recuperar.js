$(document).ready(function(){
    $('#aviso1').hide();
    $('#aviso2').hide();
    $('#form-recuperar').submit(e=>{
        $('#aviso1').hide();
        $('#aviso2').hide();
        Mostrar_Loader('Recuperar_password');
        let email = $('#email').val();
        let dni = $('#dni').val();
        if(email== ''|| dni==''){
            $('#aviso2').show();
            $('#aviso2').text('Rellene todos los campos');
            Cerrar_Loader("");
        }
        else{
            $('#aviso2').hide();
            let funcion ='verificar';
            $.post('../controlador/RecuperarController.php',{funcion,email,dni},(response)=>{
                if(response=='encontrado'){
                    let funcion ='recuperar';
                    $('#aviso2').hide();
                    $.post('../controlador/RecuperarController.php',{funcion,email,dni},(response2)=>{
                        $('#aviso2').hide();
                        if(response2=='Enviado'){
                            Cerrar_Loader('exito_envio');
                            $('#aviso1').show();
                            $('#aviso1').text('Se restablecio su contraseña');
                            $('#form-recuperar').trigger('reset');
                        
                        }
                        else{
                            Cerrar_Loader('error_envio');
                            $('#aviso2').show();
                            $('#aviso2').text('No se pudo restablecer su contraseña');
                            $('#form-recuperar').trigger('reset');
                        }
                    })
                }
                else{
                    Cerrar_Loader('error_usuario');
                    $('#aviso2').hide();
                    $('#aviso2').show();
                    $('#aviso2').text('El usuario no a sido encontrado o no coinciden los datos');
                }
            })
        }
        e.preventDefault();
    })

    function Mostrar_Loader(Mensaje){
        var texto = null;
        var mostrar = false;
        switch (Mensaje) {
            case 'Recuperar_password':
                texto = 'El correo esta siendo enviado, Por favor espere...';
                mostrar = true;
                break;
        }
        if(mostrar){
            Swal.fire({
                title: 'Enviando correo',
                text: texto,
                showConfirmButton: false
            })
        }
    }
    function Cerrar_Loader(Mensaje){
        var tipo = null;
        var texto = null;
        var mostrar = false;
        switch (Mensaje) {
            case 'exito_envio':
                tipo='success';
                texto = 'El correo fue enviado correctamente';
                mostrar = true;
                break;
                case 'error_envio':
                    tipo='error';
                    texto = 'El correo no se puedo enviar, por favor intente mas tarde.';
                    mostrar = true;
                    break;
                    case 'error_usuario':
                        tipo='error';
                        texto = 'Los datos ingresados no exiten o estan mal diligenciados.';
                        mostrar = true;
                        break;
        
            default:
                swal.close();
                break;
        }
        if(mostrar){
            Swal.fire({
                position: 'center',
                icon: tipo,
                text: texto,
                showConfirmButton: false
            })
        }
    }
})