$(document).ready(function(){
    buscar_cliente();
    var funcion;

    function buscar_cliente(consulta){
        funcion='buscar';
        $.post('../controlador/ClienteController.php',{consulta,funcion},(response)=>{
            console.log(response);
            const clientes = JSON.parse(response);
            let template='';
            clientes.forEach(cliente => {
                template+=`
                <div cliId="${cliente.id}"cliTelefono="${cliente.telefono}"cliCorreo="${cliente.correo}"cliNombre="${cliente.nombre}"class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <h1 class="badge badge-success">Cliente</h1>
            </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-5">
                            <h2 class="lead"><b>${cliente.nombre}</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Dni: ${cliente.dni}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Telefono: ${cliente.telefono}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Correo: ${cliente.correo}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Sexo: ${cliente.sexo}</li>
                                    </ul>
                        </div>
                        <div class="col-7 text-center">
                            <img src="${cliente.avatar}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button class="editar btn btn-sm bg-success" title="Editar cliente" type="button" data-toggle="modal" data-target="#editarcliente">
                            <i class="fas fa-pencil"></i>
                        </button>
                        <button class="borrar btn btn-sm bg-danger" title="Eliminar cliente">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
                `;
            });
            $('#clientes').html(template);
        });
    }
    $(document).on('keyup','#buscar_cliente',function(){
        let valor=$(this).val();
        if(valor!=''){
            buscar_cliente(valor);
        }
        else{
            buscar_cliente();
        }
    });
    $('#form-crear').submit(e=>{
        let nombre= $('#nombre').val();
        let apellido= $('#apellido').val();
        let dni= $('#dni').val();
        let telefono= $('#telefono').val();
        let correo= $('#correo').val();
        let sexo= $('#sexo').val();
        funcion = "crear";
        $.post('../controlador/ClienteController.php',{nombre, apellido,dni,telefono,correo,sexo,funcion},(response)=>{
            if(response=='add'){
                $('#add-cli').hide('slow');
                $('#add-cli').show(1000);
                $('#add-cli').hide(3000);
                $('#form-crear').trigger('reset');
                buscar_cliente();
            } 
            if(response=='noadd'){
                $('#noadd-cli').hide('slow');
                $('#noadd-cli').show(1000);
                $('#noadd-cli').hide(3000);
                $('#form-crear').trigger('reset');
            }
        })
        e.preventDefault();
    });
    $(document).on('click','.editar',(e)=>{
        let elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        let telefono = $(elemento).attr('cliTelefono');
        let correo = $(elemento).attr('cliCorreo');
        let id = $(elemento).attr('cliId');
        $('#telefono_edit').val(telefono);
        $('#correo_edit').val(correo);
        $('#id_cliente').val(id);
    })
    $('#form-editar').submit(e=>{
        let id= $('#id_cliente').val();
        let telefono= $('#telefono_edit').val();
        let correo= $('#correo_edit').val();
        funcion = "editar";
        $.post('../controlador/ClienteController.php',{id,telefono,correo,funcion},(response)=>{
            console.log(response);
            if(response=='edit'){
                $('#edit-cli').hide('slow');
                $('#edit-cli').show(1000);
                $('#edit-cli').hide(3000);
                $('#form-editar').trigger('reset');
                buscar_cliente();
            } 
            if(response=='noedit'){
                $('#noedit-cli').hide('slow');
                $('#noedit-cli').show(1000);
                $('#noedit-cli').hide(3000);
                $('#form-editar').trigger('reset');
            }
        })
        e.preventDefault();
    });
    $(document).on('click','.borrar',(e)=>{
        funcion="borrar";
        let elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        let id = $(elemento).attr('cliId');
        let nombre= $(elemento).attr('cliNombre');
        let avatar= '../img/avatar1.jpg';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
            title: 'Desea eliminar '+nombre+'?',
            text: "No podras recuperar esto!",
            imageUrl:''+avatar+'',
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar esto!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                $.post('../controlador/ClienteController.php',{id,funcion},(response)=>{
                    
                    if(response=='borrado'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'El cliente '+nombre+' fue eliminado',
                            'success'
                        )
                        buscar_cliente();
                    }
                    else{
                        swalWithBootstrapButtons.fire(
                            'No se pudo eliminar!',
                            'El cliente '+nombre+' no fue eliminado porque esta siendo usado en un lote',
                            'success'
                        )
                    }
                })
            } else if (
              /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'El cliente '+nombre+' no ha sido eliminado :)',
            'error'
            )
        }
      })
   })
})