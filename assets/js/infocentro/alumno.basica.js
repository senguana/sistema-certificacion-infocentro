 $("#guardar_alumno_basica" ).submit(function( event ) {
       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/alumnoBasicaNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
              $("#resultado").html("Enviando...");
              },
           success: function(datos){
            $('#resultado').html(datos)
            $('#resultado').show(datos)
            $('#alumnoBasicaTabla').load('../ajax/alumnoBasicaTabla.php')
            // }else{
            //  toastr.warning('No se ha podido guardar', 'Representante');
            // }

           // $('#NuevoAlumnoBasica').modal('hide');
            }
       });
       event.preventDefault();
     });




// recuperar datos 
$('#EditAlumnoBasica').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var dni = button.data('dni') 
      $('#dni_alumn').val(dni)
      var nombre = button.data('name') 
      $('#name_alumn').val(nombre)
      var apellido = button.data('last')
      $('#last_alumn').val(apellido)
  
      var genero = button.data('genero')
      $('#genero_alumn').val(genero)

       var fecha = button.data('fecha')
      $('#fecha_alumn').val(fecha)


      var institucion = button.data('institucion')
      $('#institucion_alumn').val(institucion)

      var id = button.data('id') 
      $('#id_alumno').val(id)
    });

// editar usuario
$( "#actualizar_alumno" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/alumnosBasicaUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#response").html("Enviando...");
            },
          success: function(datos){
          $("#response").html(datos);
                        $('#alumnoBasicaTabla').load('../ajax/alumnoBasicaTabla.php');

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
$('#deleteAlumnoBasicaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$("#delete_usuario" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/alumnoEliminar.php",
          data: parametros,
          success: function(datos){
            if (datos) {
              toastr.warning('Se ha Elimanado correctamente', 'Alumno');
              $('#alumnoBasicaTabla').load('../ajax/alumnoBasicaTabla.php');
            }
          $('#deleteAlumnoBasicaModal').modal('hide');
          }
      });
      event.preventDefault();
    });


