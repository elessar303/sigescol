$(document).ready(function() {

    var table = $('#example').DataTable({
        pagingType: "full_numbers",
        lengthChange: true,
        language: {
            buttons: {
                copyTitle: 'Añadido al portapapeles',
                copyKeys: 'Pulse <i> Ctrl </ i> o <i> \ u2318 </ i> + <i> C </ i> para copiar datos de la tabla en el portapapeles. <br> cancelar, haga clic en este mensaje o pulse Esc',
                copySuccess: {
                    _: 'Copiados %d registros',
                    1: 'Copiado 1 registro'
                }
        },
        decimal: ",",
        thousands: ".",
        sProcessing:     "Procesando...",
        sLengthMenu:     "Mostrar _MENU_ registros",
        sZeroRecords:    "No se encontraron resultados",
        sEmptyTable:     "NingÃºn dato disponible en esta tabla",
        sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix:    "",
        sSearch:         "Buscar:",
        sUrl:            "",
        sInfoThousands:  ".",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst:    "Primero",
            sLast:     "Último",
            sNext:     "Siguiente",
            sPrevious: "Anterior"
            },
        oAria: {
            sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        }
    } );

    new $.fn.dataTable.Buttons( table, {
    buttons: [ 
            {extend: 'copy', text: '<i class="fa fa-files-o"></i>', titleAttr:'Copiar Registros'}, 
            {extend: 'excel', text: '<i class="fa fa-file-excel-o"></i>', titleAttr:'Exportar a Excel'}, 
            {extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>',titleAttr:'Exportar a PDF'}, 
            {extend: 'print', text: '<i class="fa fa-print"></i>',titleAttr:'Imprimir'},
            {extend: 'colvis', text: '<i class="fa fa-eye-slash"></i>',titleAttr:'Mostrar/Ocultar Columnas'}
            ]
    } );

    table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

} );

function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}