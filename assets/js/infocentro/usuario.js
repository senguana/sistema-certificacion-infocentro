

function Registrar()
{
    var correo_usua = $("#correo_usua").val();
    var usuario_usua = $("#usuario_usua").val();
    var password = $("#password_usua").val();
   
    $("#resultados_ajax").html("Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "./../ajax/nuevo_usuario.php",
        data: "correo_usua="+correo_usua+"&usuario_usua="+usuario_usua+"&password_usua="+password,
        success: function(resp){
            $('#resultados_ajax').html(resp);
            Limpiar();
            
        }
    });
}   

function Limpiar()
{
    $("#correo_usua").val("");
    $("#usuario_usua").val("");
    $("#password_usua").val("");
}