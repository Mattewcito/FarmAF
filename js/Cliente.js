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
                <div cliId="${cliente.id}"cliNombre="${cliente.nombre}"cliDni="${cliente.dni}"cliEdad="${cliente.edad}"cliTelefono="${cliente.telefono}"cliCorreo="${cliente.correo}"cliSexo="${cliente.sexo}"cliAdicional="${cliente.adicional}"class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <h1 class="badge badge-success">Proveedor</h1>
            </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>${cliente.nombre}</b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Dni: ${cliente.dni}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Edad: ${cliente.edad}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Telefono: ${cliente.telefono}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Correo: ${cliente.correo}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Sexo: ${cliente.sexo}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Adicional: ${cliente.adicional}</li>
                                    </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="${cliente.avatar}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button class="editar btn btn-sm bg-success" title="Editar cliente" type="button" data-toggle="modal" data-target="#crearcliente">
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
        let edad= $('#edad').val();
        let telefono= $('#telefono').val();
        let correo= $('#correo').val();
        let sexo= $('#sexo').val();
        let adicional= $('#adicional').val();
        console.log(nombre+apellido+dni+edad+telefono+correo+sexo+adicional);
        e.preventDefault();
    });
})