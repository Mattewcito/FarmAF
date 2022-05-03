$(document).ready(function(){
    listar_compras();
    function listar_compras(){
        funcion='listar_compras';
        $.post('../controlador/ComprasController.php', {funcion},(response)=>{
            console.log(response);
            let datos = JSON.parse(response);
            let datatable = $('#compras').DataTable( {
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
                                        <button class="ver btn btn-success" type="button" data-toggle="modal" data-target="#vista_venta"><i class="fas fa-search"></i></button>
                                        <button class="borrar btn btn-danger"><i class="fas fa-window-close"></i></button>`} 
                ],
                "language": espanol
            } );
        })
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