

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




function home(){
    $.ajax({
        url: 'inicio.php',
        success: function(result){
            breadcrumControl(true);
            $(".contenido").html(result);
            //Carrousel inicial
            $('.slider').slider();

           
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

function cargarPerfil(){
    $.ajax({
        url: "perfil.php",
        success: function(result){
            $(".navPerfil").html(result);
            $.ajax({url: "",
                success: function(result){
                    $(".carritoP").html(result);
                }
            });
        }
    });
}

