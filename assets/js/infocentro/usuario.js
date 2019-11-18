
$("#guardar_usuario" ).submit(function( event ) {
       var parametros = $(this).serialize();

       $('#error').hide();
      
       $.ajax({
           type: "POST",
           url: "../ajax/usuarioNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
               $("#error").html("Enviando...");
               },
           success: function(datos){
            $('#error').html(datos);
            $('#error').show(datos);
            if (datos) {
               // $('input[type="text"]').val('');
               //  $('input[type="email"]').val('');
              $('#resultadoTablaUsuario').load('./../ajax/usuarioTabla.php');
            }
            
           
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
            
     
           $('#deleteUsuarioModal').modal('hide');
           $('#resultadoTablaUsuario').load('./../ajax/usuarioTabla.php');
           
         
          }
      });
      event.preventDefault();
    });