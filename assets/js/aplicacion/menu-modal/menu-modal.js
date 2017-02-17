//REGISTRO
$(function () {
    //MENSAJE DE ALERTA LOGIN
    $('#alert-login').hide(); // ocultar por defecto
    $("#iguales").append().hide(); //oculta mensaje usuario existe

    //FUNCION FORMULARIO LOGIN
    $('#loginForm').on('submit', function (e) {
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: "http://www.picon.com/cinicio/ajax_login",
            type: "POST",
            data: {username: username, password: password},
            cache: false,
            success: function (json) {
                $('#alert-login').hide();
                //console.log(json);
                $('#myModal').modal('toggle');
                location.reload();
            },
            error: function (json) {
                $('#alert-login').show();
                //console.log(json);
            }
        });
        e.preventDefault();
    });

    //FUNCION DATE PICKER
    $('#fecha').datetimepicker({
        format: 'DD/MM/YYYY',
        allowInputToggle: true
    });

    //VALIDACION FORMULARIO REGISTRO
    $('#registroForm').validator(); //activar validacion formulario registro

    //ACCIONES FORMULARIO REGISTRO
    $('#registro_form').on('submit', function (e) { //funcion jquery para form registrar
        $("#iguales").append().hide();
        e.preventDefault();
        var username = $('#usuario').val();

        $.ajax({
            url: "cinicio/ajax_comprobar_usuario",
            type: "POST",
            dataType: "json",
            data: {username: username},
            cache: false,
            success: function (json) {
                usuario_existe(json);
            },
            error: function (obj) {
            }
        });
    });
    //
});

function usuario_existe(json) {
    if (!json.existe) {
        var username = $('#nombre').val();
        var apellido = $('#apellido').val();
        var fecha_nacimiento = $('#fecha').val();
        var direccion = $('#direccion').val();
        var mail = $('#mail').val();
        var usuario = $('#usuario').val();
        var password = $('#pass1').val();

        $.ajax({
            url: "http://www.picon.com/cinicio/registrar",
            type: "POST",
            dataType: "json",
            data: {
                username: username, apellido: apellido, fecha_nacimiento: fecha_nacimiento, direccion: direccion,
                usuario: usuario, password: password, mail: mail
            },
            cache: false,
            success: function (json) {
                console.log(json);
                location.reload();
            },
            error: function (obj) {
            }
        });
    } else {
        //usuario existe
        //se muestra error
        $("#iguales").append().show();
    }
};
