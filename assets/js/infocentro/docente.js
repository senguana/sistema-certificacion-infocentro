 $("#guardar_docente" ).submit(function( event ) {
       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/docenteNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
              $("#error").html("Enviando...");
              },
           success: function(datos){
            $('#msg_error').html(datos);
           if (datos) {
            toastr.success('Se ha registrado correctamente', 'representante');
           }else{
            toastr.warning('No se ha podido guardar', 'Representante')
           }

           $('#NuevoDocente').modal('hide');
           }
       });
       event.preventDefault();
     });




// recuperar datos 
$('#EditRepresentante').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var dni = button.data('dni') 
      $('#dni_repre').val(dni)
      var nombre = button.data('nombre') 
      $('#nombre_repre').val(nombre)
      var apellido = button.data('apellido')
      $('#apell_repre').val(apellido)
  
      var genero = button.data('genero')
      $('#genero_repre').val(genero)

       var telefono = button.data('tel')
      $('#repre_tel').val(telefono)


      var profesion = button.data('profesion')
      $('#profesion_repre').val(profesion)
      var id = button.data('id') 
      $('#id_repre').val(id)
    });

// editar usuario
$( "#editar_representante" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/representanteUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#resultado").html("Enviando...");
            },
          success: function(datos){
          $("#resultado").html(datos);
           // if (datos==false) {
           //   $("#resultado").html("Error...");
           // }else{
           //  $("#resultado").html("Se in serto...");
           // }
         
          // $('#EditRepresentante').modal('hide');
          }
      });
      event.preventDefault();
    });


// eliminar usuario
$('#deleteRepresentanteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$("#delete_representante" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/representanteDelete.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#resultado").html("Enviando...");
            },
          success: function(datos){
            if (datos) {
              toastr.warning('Se ha Elimanado correctamente', 'Representante');
            }
          $('#deleteRepresentanteModal').modal('hide');
          }
      });
      event.preventDefault();
    });