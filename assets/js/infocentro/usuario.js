
// $(document).ready(function() {
  
//   manageBrandTable = $("#ListarUsuario").DataTable({
//     'ajax': './../ajax/table_usuario.php',
//     'order': []   
    
    
//   });

//   // submit brand form function
//   $("#guardar_usuario").unbind('submit').bind('submit', function() {
//     // remove the error text
//     $(".text-danger").remove();
//     // remove the form error
//     $('.form-group').removeClass('has-error').removeClass('has-success');     

//     var dni =  $('#dni_usua').val();
//     var nombre = $('#nombre_usua').val();
//     var apellido = $('#apell_usua').val();
//     var correo = $('#correo_usua').val();
//     var genero = $('#genero_usua').val();
//     var user = $('#usuario_usua').val();
//     var profesion = $('#profesion_usua').val();
      

//     if(dni== "") {
//       $("#dni_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#dni_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#dni_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#dni_usua").closest('.form-group').addClass('has-success');     
//     }

//     if(nombre== "") {
//       $("#nombre_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#nombre_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#nombre_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#nombre_usua").closest('.form-group').addClass('has-success');     
//     }
//     if(apellido== "") {
//       $("#apell_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#apell_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#apell_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#apell_usua").closest('.form-group').addClass('has-success');     
//     }
//     if(correo== "") {
//       $("#correo_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#correo_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#correo_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#correo_usua").closest('.form-group').addClass('has-success');     
//     }
//     if(genero== "") {
//       $("#genero_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#genero_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#genero_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#genero_usua").closest('.form-group').addClass('has-success');     
//     }
//     if(user== "") {
//       $("#usuario_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#usuario_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#usuario_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#usuario_usua").closest('.form-group').addClass('has-success');     
//     }

//      if(profesion== "") {
//       $("#profesion_usua").after('<p class="text-danger">Este campo es obligatorio</p>');
//       $('#profesion_usua').closest('.form-group').addClass('has-error');
//     } else {
  
//       $("#profesion_usua").find('.text-danger').remove();
//       // success out for form 
//       $("#profesion_usua").closest('.form-group').addClass('has-success');     
//     }



//     if(dni && nombre && apellido && correo && genero && usuario && profesion) {
//       var form = $(this);
//       // button loading
//       $("#crearUsuario").button('loading');

//       $.ajax({
//         url : './../ajax/nuevo_usuario.php',
//         type: 'POST',
//         data: form.serialize(),
//         dataType: 'json',
//         success:function(response) {
//           // button loading
//           $("#crearUsuario").button('reset');

//           if(response.success == true) {
//             // reload the manage member table 
//             manageBrandTable.ajax.reload(null, false);            

//             // reset the form text
//             $("#crearUsuario")[0].reset();
//             // remove the error text
//             $(".text-danger").remove();
//             // remove the form error
//             $('.form-group').removeClass('has-error').removeClass('has-success');
            
//             $('#add-brand-messages').html('<div class="alert alert-success">'+
//             '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
//             '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
//           '</div>');

//             $(".alert-success").delay(500).show(10, function() {
//               $(this).delay(3000).hide(10, function() {
//                 $(this).remove();
//               });
//             }); // /.alert
//           }  // if

//         } // /success
//       }); // /ajax  
//     } // if

//     return false;
//   }); // /submit brand form function

// // });




  // GUARDAR USUARIO
 $("#guardar_usuario" ).submit(function( event ) {
       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/usuarioNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
             $("#error").html("Enviando...");
             },
           success: function(datos){
           $("#error").html(datos);
           $('#guardar_usuario').modal('hide');
           }
       });
       event.preventDefault();
     });



// recuperar datos 
$('#EditUsuario').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var dni = button.data('dni') 
      $('#dni_usua').val(dni)
      var nombre = button.data('nombre') 
      $('#nombre_usua').val(nombre)
      var apellido = button.data('apellido')
      $('#apell_usua').val(apellido)
      var correo = button.data('correo')
      $('#correo_usua').val(correo)

      var genero = button.data('genero')
      $('#genero_usua').val(genero)

      var user = button.data('user')
      $('#usuario_usua').val(user)

      var profesion = button.data('profesion')
      $('#profesion_usua').val(profesion)
      var id = button.data('id') 
      $('#id_user').val(id)
    });

// editar usuario
$( "#editar_usuario" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/usuarioUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#resultado").html("Enviando...");
            },
          success: function(datos){
          $("#resultado").html(datos);
         
          $('#EditUsuario').modal('hide');
          }
      });
      event.preventDefault();
    });


// eliminar usuario
$('#deleteUsuarioModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$( "#delete_usuario" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/usuarioDelete.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#resultado").html("Enviando...");
            },
          success: function(datos){
          $("#resultado").html(datos);
        
          $('#deleteUsuarioModal').modal('hide');
          }
      });
      event.preventDefault();
    });