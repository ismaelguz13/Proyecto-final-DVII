
//Codigo para la extracion de datos y impresion de los mismos en Data Table
$(document).ready( function () {
    eliminaryes();
    var dt = $('#dtpreguntas').DataTable({
        ajax:{
            url: 'allpreg',
            method: "GET",
        },
        columns:[
            {data: 'id_pregunta'},
            {data: 'descrip_preg'},
            {
            "class":          "details-control",
            "orderable":      false,
            "data":           null,
            "defaultContent": ""
            },
            {data: 'id_pregunta',
            render: function(data, t, r, meta) {
                    return "<div class='col' style='text-align: center;'><a class='btn btn-success' href='/editarpreg/"+data+"'><img class='text-danger' src='../icons/modificar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Modificar'></a></div>";
            }},
            {data: 'id_pregunta',
            render: function(data, t, r, meta) {
                    return "<div class='col' Style='text-align: center;'><button type='button' class='editor_remove btn btn-danger' onclick='modalcmf("+data+")'><img src='../icons/eliminar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Eliminar'></button></div>";
            }},
        ],
        fixedColumns: true,
        language:{
            info: "_TOTAL_ registros",
            search: '<br>Buscar:',
            paginate:{
                next:"Siguiente",
                previous:"Anterior"
            },
            lengthMenu: '<br>Mostrar <select>'+
                    '<option value="10">10</option>'+
                    '<option value="30">30</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> registros por página',
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            emptyTable: "No hay datos...",
            zeroRecords: "No hay coincidencias",
            infoEmpty: "",
            infoFiltered: ""
        }
        
    });
    var detailRows = [];

$('#dtpreguntas tbody').on( 'click', 'tr td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = dt.row( tr );
    var idx = $.inArray( tr.attr('id'), detailRows );
    
    if ( row.child.isShown() ) {
        tr.removeClass( 'details' );
        row.child.hide();
        // Remove from the 'open' array
        detailRows.splice( idx, 1 );
    }
    else {
        tr.addClass( 'details' );
        row.child( format( row.data() ) ).show();
        // Add to the 'open' array
        if ( idx === -1 ) {
            detailRows.push( tr.attr('id') );
        }
    }
} );
// On each draw, loop over the `detailRows` array and show any child rows
dt.on( 'draw', function () {
    $.each( detailRows, function ( i, id ) {
        $('#'+id+' td.details-control').trigger( 'click' );
    } );
} );    
} );
function modalcmf(idpre){
    $('#idpreg').val(idpre);
    $('#modalConfirmDelete').modal({
    keyboard: false,
    backdrop: 'static'});
}
function eliminaryes(idpre) {
    $('#btneliminar').on('click', function(e) {
        e.preventDefault();
    });
    fetch('delete/'+$('#idpreg').val(),{
        method: 'GET'
    }).then(function(d){
        console.log(d);
        $('#dtpreguntas').DataTable().ajax.reload();
        $('#modalConfirmDelete').modal('hide');
    })
}

// Formato a mostrar en el Details del Data table
function format ( d) {
    var a1="";
    var b1="";
                 if (d.tipo_preg === "A"){
                     a1="Abierta";
                 } else if (d.tipo_preg === "CR"){
                     a1="Cerrada"; 
                 } else{
                     a1="Seleccion Multiple";
                 }   
 
                 if (d.id_seccion === 7){
                     b1="Sección A: Generales Demográficos";
                 } else{
                     b1="Sección B: Generales de Contacto";
                 }   
                 
     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                 '<tr>'+
                 '<td>'+'<p><strong>Tipo de Pregunta: </strong>'+a1+'</p>'+'<td>'+
                 '</tr>'+
                 '<tr>'+
                 '<td>'+'<p><strong>Seccion en Encuesta: </strong>'+b1+'</p>'+'<td>'+
                 '</tr>'+
                 '<tr>'+
                 '<td>'+'<p><strong>Cantidad de Respuestas: </strong>'+d.details+'</p>'+'<td>'+
                 '</tr>'+
                 '<tr>'+
                 '<td>'+'<p><strong>Respuestas: <br></strong>'+d.pregunta+'</p>'+'<td>'+
                 '</tr>'+
             '</table>'; 
 }