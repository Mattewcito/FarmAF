$(document).ready(function () {
    $('#cat-carrito').show();
    mostrar_lotes_riesgo();
    buscar_producto();
    function buscar_producto(consulta) {
        funcion = "buscar";
        $.post('../controlador/ProductoController.php', {
            consulta,
            funcion
        }, (response) => {
         // console.log(response);
            const productos = JSON.parse(response);
            let template = "";
            productos.forEach(producto => {
                template += `
                <div prodId="${producto.id}" prodStock="${producto.stock}" prodNombre="${producto.nombre}"prodPrecio="${producto.precio}"prodConcentracion="${producto.concentracion}"prodAdicional="${producto.adicional}"prodLaboratorio="${producto.laboratorio_id}"prodTipo="${producto.tipo_id}"prodPresentacion="${producto.presentacion_id}"prodAvatar="${producto.avatar}"class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    <i class="fas fa-lg fa-cubes mr-1"style="color: #1C293A"></i>${producto.stock}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                      <h2 class="lead"><b>Codigo: ${producto.id}</b></h2>
                        <h2 class="lead"><b>${producto.nombre}</b></h2>
                        <h4 class="lead"><b><i class="fas fa-lg fa-dollar-sign" mr-1></i>${producto.precio}</b></h4>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"style="color: #1C293A"></i></span> Concentracion: ${producto.concentracion}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-prescription-bottle-alt"style="color: #1C293A"></i></span>  Adicional: ${producto.adicional}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-flask"style="color: #1C293A"></i></span>  Laboratorio: ${producto.laboratorio}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-copyright"style="color: #1C293A"></i></span>  Tipo: ${producto.tipo}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-pills"style="color: #1C293A"></i></span>  Presentacion: ${producto.presentacion}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="${producto.avatar}" alt="" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <button class="agregar-carrito btn btn-sm btn-primary"style="
                        color: #fff;
                        background-color: #1C293A!important;
                        border-color: #1C293A!important">
                        <i class="fas fa-plus-square mr-2"></i>Agregar al carrito 
                      </button>
                    </div>
                  </div>
                </div>
              </div>
                `;
            });
            $('#productos').html(template);
        });
    }
    $(document).on('keyup', '#buscar-producto', function () {
        let valor = $(this).val();
        if (valor != "") {
            buscar_producto(valor);
        } else {
            buscar_producto();
        }
    });
    function mostrar_lotes_riesgo(){
        funcion="buscar_lotes_riesgo";
        $.post('../controlador/LoteController.php', {funcion}, (response)=>{
            const lotes= JSON.parse(response);
            datatable = $('#lotes').DataTable( {
              data: lotes,
              "columns": [
                  { "data": "id" },
                  { "data": "nombre" },
                  { "data": "stock" },
                  { "data": "estado" },
                  { "data": "laboratorio" },
                  { "data": "presentacion" },
                  { "data": "proveedor" },
                  { "data": "mes" },
                  { "data": "dia" },
                  { "data": "hora" } 
              ],
              columnDefs:[{
                  "render":function(data,type,row){
                    let campo = '';
                    if(row.estado == 'danger'){
                      campo= `<h1 class="badge badge-danger">${row.estado}</h1>`;
                    }
                    if(row.estado == 'warning'){
                      campo= `<h1 class="badge badge-warning">${row.estado}</h1>`;
                    }
                    return campo;
                  },
                  "targets":[3]
                },
              ],
              "destroy":true,
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