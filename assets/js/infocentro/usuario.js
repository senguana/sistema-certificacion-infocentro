
// $("#guardar_usuario").submit(function(event) {
//   $('#guardar_datos').attr("disabled", true);

//  var parametros = $(this).serialize();
//      $.ajax({
//             type: "POST",
//             url: "./../ajax/nuevo_usuario.php",
//             data: parametros,
//              beforeSend: function(objeto){
//                 $("#msg_error").html("Mensaje: Cargando...");
//               },
//             success: function(datos){
//             $("#msg_error").html(datos);
//             $('#guardar_datos').attr("disabled", false);
          
//           }
//     });
//   event.preventDefault();
// })
// 
// var mensaje = $("#msg_error");
// mensaje.hide();
// $(document).ready(function() {
//     $("#guardar_usuario").submit(function(x) {
//         x.preventDefault();

//     // var formdata = new FormData()    
//     var correo = $("#correo_usua").val();
//     var username = $("#usuario_usua").val();
//     var pass = $("#password_usua").val();
//     var passConfirm = $("#confirmpassword").val();
//     $.ajax({
//         url: "./../ajax/nuevo_usuario.php",
//         method: "POST",
//         data: $("form").serialize(),
//         dataType: "HTML",
//         data: {correo_usua: correo, usuario_usua: username, password_usua: pass, confirmpassword: passConfirm},
//         success: function(strMessage) {
//             $("#msg_error").text(strMessage);
//             $("#guardar_usuario")[0].reset();
//         }        
//     });
//  });

// });
// function EnviarDatos() {
//     var email = document.getElementById('correo_usua');
//     var user = document.getElementById('usuario_usua');
//     var pass = document.getElementById('password_usua');
//     var confirmpass = document.getElementById('confirmpassword');

//     $.ajax({
//         type: 'POST',
//         url: './../ajax/nuevo_usuario.php',
//         data: {'correo_usua='+email+'&usuario_usua='+user+'&password_usua='+pass+'&confirmpass'+confirmpassword},
//         success:function(respuesta) {
//             if (respuesta==1) {
//                 $('#msg_error').html("Datos enviados");
//             }else{
//                  $('#msg_error').html("Datos no enviados");
//             }
//         }

//     })
// }

// $("#guardar_datos").click(function() {
//     var email = document.getElementById('correo_usua').value;
//     var user = document.getElementById('usuario_usua').value;
//     var pass = document.getElementById('password_usua').value;
//     var confirmpass = document.getElementById('confirmpassword').value;

//     var ruta = "email="+email+"&user="+user+"&pass="+pass+"&confirmpass="+confirmpass;

//     $.ajax({
//         url: './../ajax/nuevo_usuario.php',
//         type: 'POST',
//         data: ruta,
//     })
//     .done(function(res) {
//         $('#msg_error').html(res);
//         alert("Se inserto");
//     })
//     .fail(function() {
//         console.log("ERROR");
//     })
//     .always(function() {
//         console.log("complete");
//     })
// })

$(function()
{
    $('#login_user').click(function(event){
        event.preventDefault();

        $.post('proceso_login.php',$('#loginForm').serialize(),function(resp)
        {
            if (resp['status'] == true)
            {
                location.href = "home.php";
            }
            else
            {
                var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
                $.each(resp['msg'],function(index,val){
                    htm += val+" <br>";
                    });
                $("#msg_error").html(htm);
                $("#msg_error").show(); 
                $(this).prop('disabled',false);
            }
        },'json');
    });
});