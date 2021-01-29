

$(document).ready(function(){
	function sparklineNumberChart() {
		var params = {
			width: '140px',
			height: '30px',
			lineWidth: '2',
			lineColor: '#20B2AA',
			fillColor: false,
			spotRadius: '2',
			spotColor: false,
			minSpotColor: false,
			maxSpotColor: false,
			disableInteraction: false
		};
		$('#number-chart1').sparkline('html', params);
		$('#number-chart2').sparkline('html', params);
		$('#number-chart3').sparkline('html', params);
		$('#number-chart4').sparkline('html', params);
	};

	sparklineNumberChart();

    $.ajax({
        url: "administrador/pedidosInicio.php",
        success: function(result){
            $(".tabla").html(result);
        }
    });

	toastr.options.closeButton = true;
	toastr.options.positionClass = 'toast-bottom-right';
	toastr.options.showDuration = 1000;
	toastr['success']("Bienvenido Administrador")

});


function mostrarVista(vista){
    $.ajax({url: "administrador/" + vista + ".php",
        success: function(result){
            $("#cuerpo").html(result);
        }
    });
}

function ordenar(){
    $.post("version.php",{
        campo: $(".selectOrdenar").val(), 
        orden: $(".selectAlternal").val()
    },function(data){
        $(".cuerpo").html(data);
    });
}



function juegoNuevo(){ 
    $('#nuevoJuegoForm')[0].reset(); 
    $('#nuevoJuegoForm').parsley().reset();
    $("#nuevoJuego").modal('show');
    $("#nuevoJuegoForm").on('submit', function(){
        $.ajax({
            type: "POST",
            url: "administrador/accionesCrud.php?juego&accion=crear",
            data: {
                nombre: $("#nombreJuegoNuevo").val(),
                desc: $("#descripcionJuegoNuevo").val()
            },
            success: function(response){
                if(response == "true"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    $("#nuevoJuego").modal('hide');
                    toastr['success']("¡Videojuego insertado!");
                }else if(response == "false"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe el juego");
                }else{
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor");
                }
                
                mostrarVista('juego');
            },
            error: function(){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear el juego :(");
            }
        })
    });
}
function plataformaNueva(){ 
    console.log('hola');
    $('#nuevaPlataformaForm')[0].reset(); 
    $('#nuevaPlataformaForm').parsley().reset(); 
    $("#nuevaPlataforma").modal('show');
    $("#nuevaPlataformaForm").on('submit', 
    function(){
        $.ajax({
            type: "POST",
            url: "administrador/accionesCrud.php?plataforma&accion=crear",
            data: {
                nombre: $("#nombrePlataformaNueva").val()
            },
            success: function(response){
                if(response == "true"){
                    $("#nuevaPlataforma").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['success']("¡Nueva plataforma registrada!");
                }else if(response == "false"){
                    $("#nuevaPlataforma").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe esta plataforma");
                }else{
                    $("#nuevaPlataforma").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor :(");
                }
              
                mostrarVista('plataforma');
            },
            error: function(){
                $("#nuevaPlataforma").modal('hide');
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear este plataforma");
            }
        })
    });
}

function edicionNueva(){
    $('#nuevaEdicionForm')[0].reset();
    $('#nuevaEdicionForm').parsley().reset();
    $("#nuevaEdicion").modal('show');
    $("#nuevaEdicionForm").on('submit', function(){
        $.ajax({
            type: "POST",
            url: "administrador/accionesCrud.php?edicion&accion=crear",
            data: {
                nombre: $("#nombreEdicionNueva").val(),
                desc: $("#descripcionEdicionNueva").val()
            },
            success: function(response){
                if(response == "true"){
                    $("#nuevaEdicion").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['success']("¡Nueva edición registrada!");
                }else if(response == "false"){
                    $("#nuevaEdicion").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe la edicion");
                }else{
                    $("#nuevaEdicion").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor");
                }
                console.log(response);
                mostrarVista("edicion");
            },
            error: function(){
                $("#nuevaEdicion").modal('hide');
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear la edición :(");
            }
        })
    });
}

function versionNueva(){ 
    $.ajax({
        type: "POST",
        url: "administrador/formularioVersion.php",
        success: function(response){
            $("#cuerpo").html(response);
        }
    })
}


function guardarVersion(){
    $.ajax({
        type: "POST",
        url: "administrador/guardarVersion.php",
        data: {
            nombreJuego: $("#idJuegoNuevo option:selected").text(),
            nombrePlataforma: $("#plataformaJuegoNuevo option:selected").text(),
            juego:  $("#idJuegoNuevo").val(),
            edicion: $("#edicionJuegoNuevo").val(),
            plataforma: $("#plataformaJuegoNuevo").val(),
            distribuidora: $("#idDistribuidora").val(),
            precio: $("#precioNuevo").val(),
            stock: $("#stockNuevo").val(),
            salida: $("#fechaNueva").val(),
            img: $("#foto").val()
        },
        success: function(response){
            mostrarVista("version");
        }
    });
}

function deshabilitarVersion(idVersion){ 
    $.ajax({
        type: "POST",
        url: "administrador/version.php?des",
        data: {
            id: idVersion
        },
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}
function activarVersion(id){
    $.ajax({
        type: "POST",
        url: "administrador/version.php?hab",
        data: {
            id: id
        },
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}
function buscar(){
    $.ajax({
        type: "POST",
        url: "administrador/version.php?buscar",
        data: {
            juego: $("#nombreJugarBuscar").val()
        },
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}



function borrarDEPRECATED(idVersion){
    var idEliminar =  idVersion.id;
    $(".NombreVersionEliminar").html($(idVersion).parent().siblings("td.nombreJuegoTabla").html());
    $(".edicionVersionEliminar").html($(idVersion).parent().siblings("td.edicionTabla").html());
    $(".plataformaVersionEliminar").html($(idVersion).parent().siblings("td.plataformaTabla").html());
    $( ".eliminarVersionModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Eliminarlo: function() {
                $.get("borrarVersion.php",{
                    "idVersion":idEliminar
                },function(){
                    $("#parte_" + idEliminar).fadeOut(500);
                });
                $( this ).dialog( "close" );
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }
    });
}

function nuevaVersionDEPRECATED(){
    $( ".fechapicker" ).datepicker({
                            firstDay: 1,
                            dateFormat: "yy-mm-dd"
                        });
    $( ".añadirVersionModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        open: function(){ 
            $("#formNuevoVersion").validate({
                rules: {
                    precioNV: {required: true,min: 1, maxlength: 10},
                    stockNV:{required:true, min: 1, maxlength: 10},
                    fechaNV:{required:true}
                },
                messages:{
                    precioNV: "No puede ser negativo",
                    stockNV: "No puede ser negativo",
                    fechaNV: "Fecha obligatoria"
                },
                submitHandler: function(form){
                    $.post("guardarVersion.php", {
                        idNombre:  $("#idJuegoNuevo").val(),
                        nombreJuego: $("#idJuegoNuevo option:selected").text(),
                        idEdicion: $("#edicionJuegoNuevo").val(),
                        idPtl: $("#plataformaJuegoNuevo").val(),
                        nombrePlataforma: $("#plataformaJuegoNuevo option:selected").text(),
                        idDis: $("#idDistribuidora").val(),
                        precio: $("#precioNuevo").val(),
                        stock: $("#stockNuevo").val(),
                        fecha: $("#fechaNueva").val()
                    },function(data){
                        $(".cuerpo").empty();
                        $(".cuerpo").append(data);
                    });
                    $(".añadirVersionModal").dialog( "close" );
                    $("label.error").empty();
                    $("#formNuevoVersion")[0].reset();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Añadir: function() {
                $("#formNuevoVersion").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
                $("#formNuevoVersion")[0].reset();
            }
        }
    });
}




function usuario(){
    $.ajax({
        type: "POST",
        url: "administrador/usuario.php",
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}

function mensajes(){
    $.ajax({
        type: "POST",
        url: "administrador/mensajes.php",
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}


function pedidos(){
    $.ajax({
        type: "POST",
        url: "administrador/pedidos.php?limit=10",
        success: function(response){
            $("#cuerpo").html(response);
        }
    });
}


