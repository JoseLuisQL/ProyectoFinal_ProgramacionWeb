

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


function infoVersion(idJ, nombre, plataforma, reset=null){ //Carga la información de el producto y lo añade en el contenedor
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



