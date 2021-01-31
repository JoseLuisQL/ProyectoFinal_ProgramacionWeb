

$(document).ready(function(){
    var preload = '<center style="padding-top:150px;padding-bottom:150px"><div class="preloader-wrapper big active">'+
                                '<div class="spinner-layer spinner-blue-only">'+
                                '<div class="circle-clipper left">'+
                                '<div class="circle"></div>'+
                                '</div><div class="gap-patch">'+
                                '<div class="circle"></div>'+
                                '</div><div class="circle-clipper right">'+
                                '<div class="circle"></div>'+
                                '</div>'+
                                '</div>'+
                            '</div></center>';
    home();
    var tarjeta = false;
    
    

    $('.perfil-navbar').sideNav({
        menuWidth: 300, 
        edge: 'right', 
        closeOnClick: true, 
        draggable: true, 
        onOpen: function(el) {  }, 
        onClose: function(el) {  }, 
    });

    $(".dropdown-button").dropdown();
    
    $(".button-collapse").sideNav();
    cargarPerfil();
});

function iniciarSesion(){
    $.ajax({url: "form/login_vista.php",
        success: function(result){
            $(".contenido").html(result);
        }
    });
    breadcrumControl(true,null,"Iniciar Sesión")
}

function comprobarDatos(){
    var userLogin = $("#usuarioLogin").val();
    var pass = $("#passwordLogin").val();
    if(true){
        $.ajax({
            type: "GET",
            url: "comprobarCredenciales.php",
            data: {
                usr: userLogin,
                pass: pass
            },
            success: function( data ) {
                data = JSON.parse(data);
                if (data.cod == 200) {
                    Materialize.toast(data.msg, 3000, 'green rounded');
                    home();
                    cargarPerfil();
                } else {
                    Materialize.toast(data.msg, 3000, 'red rounded');
                }
            }
        })
    }
}

function cerrarSesion(){
    $.ajax({
        type: "POST",
        url: "comprobarCredenciales.php?exit",
        success: function( response ) {
            cargarPerfil();
            Materialize.toast('¡Hasta pronto!', 3000, 'green rounded');
            home();
            cargarPerfil();
        }
    })
}
function registrarse(){
    $.ajax({
        type: "POST",
        url: "form/registrarse_vista.php",
        success: function( result ) {
            $(".contenido").html(result);
            breadcrumControl(true,null,"Registrarse");
        }
    })
}

function comprobarDatosRegistro(){
    var userLogin = $("#usuarioLogin").val();
    var pass = $("#passwordLogin").val();

    var emailLogin = $("#email").val();
    var nameLogin = $("#nombre").val();
    var aplLogin = $("#apellido").val();
    var telfLogin = $("#telefono").val();

    $.ajax({
        type: "POST",
        url: "signup.php",
        data: {
            usr: userLogin,
            pass: pass,
            email:emailLogin,
            nombre:nameLogin,
            apellido:aplLogin,
            telefono:telfLogin
        },
        success: function( data ) {
            data = JSON.parse(data);
            if(data["estado"] == "ok"){
                iniciarSesion();
                Materialize.toast('¡Perfecto!', 3000, 'green rounded');
                Materialize.toast('Ahora... ¡Inicia sesión!', 3000, 'green rounded');
            }else{
                Materialize.toast(data["msg"], 3000, 'red rounded');
            }
        }
    })
}

function home(){
    $.ajax({
        url: 'inicio.php',
        success: function(result){
            breadcrumControl(true);
            $(".contenido").html(result);
            $('.slider').slider();

            $.ajax({
                url: "infoInicio.php?nsw&init",
                success: function(result){
                    $("#nswIndex").html(result);
                }
            });
            $.ajax({
                url: "infoInicio.php?vendidos",
                success: function(result){
                    $("#vendidoIndex").html(result);
                }
            });
            $.ajax({
                url: "infoInicio.php?nuevos",
                success: function(result){
                    $("#salidaIndex").html(result);
                }
            });
            $.ajax({url: "infoInicio.php?ps4&init", success: function(result){
                $("#psIndex").html(result);
            }});
            $.ajax({url: "infoInicio.php?xone&init", success: function(result){
                $("#xboxIndex").html(result);
            }});
            $.ajax({url: "infoInicio.php?pc&init", success: function(result){
                $("#pcIndex").html(result);
            }});
        }
    });
}

function vistaPtl(plataforma, filtro=4,pagina=1){
    $.ajax({url: "infoInicio.php?" + plataforma + "&filtro=" + filtro + "&pagina=" + pagina,
        success: function(result){
            $(".contenido").html(result);
            if(plataforma == 'todo'){
                breadcrumControl(true,'videojuegos');
            }else{
                breadcrumControl(true,plataforma);
            }
        }
    });
}


function limpiarBreadcrum(){
    breadcrumControl(true);
}



function breadcrumControl(limpiar = null,plataforma = null, nombre = null){ 
    if(limpiar != null) {
        $("").remove();
        $("").remove();
        console.log("borro breadcrum");
    }
    

}


function breadcrumControl(limpiar = null,plataforma = null, nombre = null){ 
  
    if(limpiar != null) {
        $(".juegoMigas").remove();
        $(".migasInfoJuego").remove();
        console.log("borro breadcrum");
    }
    if(plataforma != null){
        $(".migasDePan").append("<a class='breadcrumb juegoMigas'>" + plataforma.toUpperCase() + "</a>");
        console.log("añado plataforma");
    }
    if(nombre != null){
        $(".migasDePan").append('<a class="breadcrumb migasInfoJuego">' + nombre + '</a>');
        console.log("añado nombre");
    }

}


function infoVersion(idJ, nombre, plataforma, reset=null){ 
    breadcrumControl(reset, null, nombre);
    $.get("infoProducto.php", {
        id: idJ,
        ptl: plataforma
    },function(data){
        $(".contenido").html(data);
    });
}
function paginaPrincipal(){
    $.ajax({url: "principal.php",
    success: function(result){
        $(".contenido").html(result);
    }});
}

function añadirCarrito(idP, precio, nombre){ 
    $.get("cliente/carrito.php",{
        idA: idP,
        precio : precio,
        nombre: nombre
    },function(data){
        Materialize.toast('¡Añadido al carrito!', 3000, 'green rounded');
        $(".carritoP").html(data);
    }
)};

function cargarPerfil(){
    $.ajax({
        url: "perfil.php",
        success: function(result){
            $(".navPerfil").html(result);
            $.ajax({url: "",
                success: function(result){
                    $("").html(result);
                }
            });
        }
    });
}

function cargarCesta(){
    $.ajax({
        url: "cliente/cesta.php",
        method: "POST",
        success: function(result){
            if(result == 1){
                Materialize.toast('¡Aun no añadiste nada a tu cesta!', 3000, 'orange rounded');
            }else{
                $(".contenido").html(result);
            }
        }
    });
}



function pagarCesta(){
    var tajeta = false;
    $.ajax({
        url: "cliente/pago.php",
        method: "POST",
        success: function(result){
            $(".contenido").html(result);
            Materialize.updateTextFields(); 
            $('.collapsible').collapsible({
                accordion: false, 
                onOpen: function(el) { }, 
                onClose: function(el) {  } 
            });
            $.ajax({ 
                url: "cliente/cesta.php?pago",
                method: "POST",
                success: function(resumen){
                    $(".resumenPago").html(resumen);
                }
            });
        }
    });
}





function eliminarUno(id){
    $.get("cliente/carrito.php?idE",{
        idE: id,
    },function(data){
        Materialize.toast('Eliminado!', 3000, 'red rounded');
        $(".contenido").html(data);
        cargarPerfil();
    });
}


function terminarPago(){
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var dni = $('#dni').val();
    var calle = $('#direccion').val();
    var numeroCalle = $('#numero').val();
    var ciudad = $('#ciudad').val();
    var provincia = $('#provincia').val();
    var cp = $('#cp').val();
    var telefono = $('#telefono').val();
    var metodoCorreo = "correos";
        var metodoPagoTarjeta = false;
        var datosPago = [null,null,null,null,null];
   
    $.ajax({
        method: "POST",
        url: "cliente/terminarPago.php",
        data: {
            nombre : nombre,
            apellidos: apellidos,
            dni : dni,
            calle : calle,
            numeroCalle : numeroCalle,
            ciudad : ciudad,
            provincia : provincia,
            cp : cp,
            telefono : telefono,
            metodoCorreo : metodoCorreo,
            metodoPagoTarjeta : metodoPagoTarjeta,
            datosPago : datosPago
        },
        success: function(result){
            result = JSON.parse(result);
            if(result["estado"]){
                var idL = result["idLocalizable"]
                
                Materialize.toast(result["msg"], 3000, 'green rounded');
                $.ajax({
                    type: "GET",
                    url: "cliente/resumenPedido.php",
                    data: {
                        id: idL
                    },
                    success: function( data ) {
                        $(".contenido").html(data);
                        $('.collapsible').collapsible({
                            accordion: false, 
                            onOpen: function(el) { }, 
                            onClose: function(el) {  } 
                        });
                    }
                })
            }else{
                Materialize.toast(result["msg"], 3000, 'red rounded');
            }
        }
    });
  
}



function tranferencia(){
    $(".tranferencia").show();
    $(".pagoTarjeta").hide();
    tarjeta = false;
}

function pagoTarjeta(){
    $(".pagoTarjeta").show();
    $(".tranferencia").hide();
    tarjeta = true;
}

function pedidosPendiente(){
    $.ajax({
        url: 'cliente/listaPedidos.php?pendiente',
        method: 'POST',
        data: {

        },
        success: function(data){
            $(".contenido").html(data);
            breadcrumControl(true,"pedientes");
        }
    })
}



function verPedido(id){
    $.ajax({
        type: "GET",
        url: "cliente/resumenPedido.php",
        data: {
            id: id
        },
        success: function( data ) {
            $(".contenido").html(data);
            $('.collapsible').collapsible({
                accordion: false, 
                onOpen: function(el) { }, 
                onClose: function(el) {  }
            });
            breadcrumControl(true,"Resumen Pedido");
        }
    })
}


function todosPedidos(){
    $.ajax({
        url: 'cliente/listaPedidos.php',
        method: 'POST',
        data: {

        },
        success: function(data){
            $(".contenido").html(data);
            breadcrumControl(true,"Historial de pedidos");
        }
    })
}


function ayudar(){
    $.ajax({
        type: "GET",
        url: "cliente/soporteTecnico.php",
        success: function( data ) {
            $(".contenido").html(data);
            breadcrumControl(true,"Soporte Técnico");
            $(document).ready(function(){
                $('ul.tabs').tabs();
            });
            $('#mensaje').val('Cual es tu consulta: ');
            $('#mensaje').trigger('autoresize');
            Materialize.updateTextFields();
        }
    })
}



function enviarMensaje(){
    $.ajax({
        type: "GET",
        url: "cliente/soporteTecnico.php?guardar",
        method: "POST",
        data: {
            nombre: $('#nombre').val(),
            correo: $('#email').val(),
            mensaje: $('#mensaje').val()
        },
        success: function( data ) {
            Materialize.toast("¡En breve te ayudaremos!", 3000, 'green rounded');
            home();
        }
    })
}

function loRecibi(localizador){
    $.ajax({
        type: "POST",
        url: "cliente/cancelarPedido.php?completado",
        data: {
            localizador: localizador
        },
        success: function( data ) {
            Materialize.toast("Muchas gracias por todo el apoyo!", 3000, 'green rounded');
            todosPedidos();
        }
    })
}

function cancelarPedido(localizador, id){
    $.ajax({
        url: 'cliente/cancelarPedido.php',
        method: 'POST',
        data: {
            idLocalizador: localizador,
            idUsr: id
        },
        success: function(data){
            data = JSON.parse(data);
            console.log(data["pedido"]);
            if(data["pedido"]==4){
                Materialize.toast(data["msg"], 3000, 'green rounded');
                todosPedidos();
            }else{
                Materialize.toast(data["msg"], 3000, 'red rounded');
            }
        }
    })
}

function nosotros(){
    $.ajax({
        type: "GET",
        url: "form/nosotros.php",
        success: function( data ) {
            $(".contenido").html(data);
        }
    })
}




function editarU(){
    $.ajax({
        url: 'form/editarU.php',
        method: 'POST',
        data: {

        },
        success: function(data){
            $(".contenido").html(data);
            breadcrumControl(true,"Editar Perfil");
        }
    })
}
