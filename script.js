

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

