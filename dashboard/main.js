$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center '><button class='btn btn-primary btnEditar fa fa-edit' style='font-size:13px;'></button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Expediente Nuevo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    num_exp = fila.find('td:eq(1)').text();
    materia_exp = fila.find('td:eq(2)').text();
    nom_procesado = fila.find('td:eq(3)').text();
    nom_agraviado = fila.find('td:eq(4)').text();
    encargado = fila.find('td:eq(5)').text();
    estado_exp = fila.find('td:eq(6)').text();
    ubicacion = fila.find('td:eq(7)').text();
    folios = parseInt(fila.find('td:eq(8)').text());
    
    $("#num_exp").val(num_exp);
    $("#materia_exp").val(materia_exp);
    $("#nom_procesado").val(nom_procesado);
    $("#nom_agraviado").val(nom_agraviado);
    $("#encargado").val(encargado);
    $("#estado_exp").val(estado_exp);
    $("#ubicacion").val(ubicacion);
    $("#folios").val(folios);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Expediente");            
    $("#modalCRUD").modal("show");  
});


    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    num_exp = $("#num_exp").val();
    materia_exp = $("#materia_exp").val();
    nom_procesado = $("#nom_procesado").val();
    nom_agraviado = $("#nom_agraviado").val();
    encargado = $("#encargado").val();
    estado_exp = $("#estado_exp").val();
    ubicacion = $("#ubicacion").val();
    folios = $("#folios").val(); 
    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {num_exp:num_exp, materia_exp:materia_exp, nom_procesado:nom_procesado,nom_agraviado:nom_agraviado,encargado:encargado,estado_exp:estado_exp,ubicacion:ubicacion,folios:folios, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            num_exp = data[0].num_exp;
            materia_exp = data[0].materia_exp;
            nom_procesado = data[0].nom_procesado;
            nom_agraviado = data[0].nom_agraviado;
            encargado = data[0].encargado; 
            estado_exp = data[0].estado_exp; 
            ubicacion = data[0].ubicacion;   
            folios = data[0].folios;
            if(opcion == 1){tablaPersonas.row.add([id,num_exp,materia_exp,nom_procesado,nom_agraviado,encargado,estado_exp,ubicacion,folios]).draw();}
            else{tablaPersonas.row(fila).data([id,num_exp,materia_exp,nom_procesado,nom_agraviado,encargado,estado_exp,ubicacion,folios]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});