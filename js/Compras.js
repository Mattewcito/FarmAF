$(document).ready(function(){
    listar_compras();
    $('.select2').select2();
    llenar_estado_pago();
    var datatable;
    function llenar_estado_pago(){
        funcion='llenar_estado';
        $.post('../controlador/EstadoController.php',{funcion},(response)=>{
            let estados = JSON.parse(response);
            let template = '';
            estados.forEach(estado=>{
                    template += `
                <option value="${estado.id}" >${estado.nombre}</option>
                `
            });
            $('#estado_compra').html(template);
        })
    }
    function listar_compras(){
        funcion='listar_compras';
        $.post('../controlador/ComprasController.php', {funcion},(response)=>{
            let datos = JSON.parse(response);
            datatable = $('#compras').DataTable( {
                data: datos,
                "columns": [
                    { "data": "numeracion" },
                    { "data": "codigo" },
                    { "data": "fecha_compra" },
                    { "data": "fecha_entrega" },
                    { "data": "total" },
                    { "data": "estado" },
                    { "data": "proveedor" },
                    { "defaultContent": `<button class="imprimir btn btn-secondary"><i class="fas fa-print"></i></button>
                                        <button class="ver btn btn-secondary" type="button" data-toggle="modal" data-target="#vista_compra"><i class="fas fa-search"></i></button>
                                        <button class="editar btn btn-secondary" type="button" data-toggle="modal" data-target="#cambiarEstado"><i class="fas fa-pencil-alt"></i></button>`} 
                ],
                "destroy":true,
                "language": espanol
            } );
        })
    }
    $('#compras tbody').on('click','.editar',function(){
        let datos = datatable.row($(this).parents()).data();
        let codigo = datos.codigo;
        codigo = codigo.split(' | ');
        let id = codigo[0];
        let estado = datos.estado;
        funcion='cambiarEstado';
        $('#id_compra').val(id);
        $.post('../controlador/EstadoController.php', {funcion,estado},(response)=>{
            let id_estado =  JSON.parse(response)
            $('#estado_compra').val(id_estado[0]['id']).trigger('change');
        })
    })
    $('#form-editar').submit(e=>{
        let id_compra = $('#id_compra').val();
        let id_estado = $('#estado_compra').val();
        funcion='editarEstado';
        $.post('../controlador/ComprasController.php',{funcion,id_compra,id_estado},(response)=>{
            if(response=='edit'){
                $('#form-editar').trigger('reset');
                $('#estado_compra').val('').trigger('change');
                $('#edit').hide('slow');
                $('#edit').show(1000);
                $('#edit').hide(3000);
                listar_compras();
            } else {
                $('#noedit').hide('slow');
                $('#noedit').show(1000);
                $('#noedit').hide(3000);
            }
        })
        e.preventDefault();
    })
    $('#compras tbody').on('click','.ver',function(){
        let datos = datatable.row($(this).parents()).data();
        let codigo = datos.codigo;
        codigo = codigo.split(' | ');
        let id = codigo[0];
        funcion="ver";
        $('#codigo_compra').html(datos.codigo);
        $('#fecha_compra').html(datos.fecha_compra);
        $('#fecha_entrega').html(datos.fecha_entrega);
        $('#estado').html(datos.estado);
        $('#cliente').html(datos.cliente);
        $('#proveedor').html(datos.proveedor);
        $('#total').html(datos.total);
        $.post('../controlador/LoteController.php',{funcion,id},(response)=>{
            let registros = JSON.parse(response);
            let template="";
            $('#detalles').html(template);
            registros.forEach(registro => {
                template+=`
                    <tr>
                        <td>${registro.numeracion}</td>
                        <td>${registro.codigo}</td>
                        <td>${registro.cantidad}</td>
                        <td>${registro.vencimiento}</td>
                        <td>${registro.precio_compra}</td>
                        <td>${registro.producto}</td>
                        <td>${registro.laboratorio}</td>
                        <td>${registro.presentacion}</td>
                        <td>${registro.tipo}</td>
                    </tr>
                `;
                $('#detalles').html(template);
            }); 
        })
    })
    $('#compras tbody').on('click','.imprimir',function(){
        Mostrar_Loader("generarReportePDF");
        let datos = datatable.row($(this).parents()).data();
        let codigo = datos.codigo;
        codigo = codigo.split(' | ');
        let id = codigo[0];
        funcion='imprimir';
        $.post('../controlador/ComprasController.php',{id, funcion},(response)=>{
            if(response==""){
                Cerrar_Loader("exito_reporte");
                window.open('../pdf/pdf-compra'+id+'.pdf','_blank');
            }
            else{
                Cerrar_Loader("error_reporte");
            }       
        })
    })
    function Mostrar_Loader(Mensaje){
        var texto = null;
        var mostrar = false;
        switch (Mensaje) {
            case 'generarReportePDF':
                texto = 'Se esta generando el reporte en formato PDF, por favor espere...';
                mostrar = true;
                break;
        }
        if(mostrar){
            Swal.fire({
                title: 'Generando reporte',
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
            case 'exito_reporte':
                tipo='success';
                texto = 'El reporte fue generado correctamente.';
                mostrar = true;
                break;
                case 'error_reporte':
                    tipo='error';
                    texto = 'El reporte no pudo generarse, comuniquese con el personal de sistemas.';
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
let espanol = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %ds fila al portapapeles"
        }
    }
};