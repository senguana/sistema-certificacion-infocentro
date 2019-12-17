 $("#guardar_persona" ).submit(function( event ) {
       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/personaNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
              $("#error").html("Enviando...");
              },
           success: function(datos){
            $('#error').html(datos);
            $('#error').show(datos);
            
            $('#TablaPersona').load('./../ajax/personaTabla.php');

           $('#guardar_curso').modal('hide');
         
           }
       });
        event.preventDefault();
     });




// recuperar datos 
$('#EditPersona').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var curso = button.data('nombres') 
      $('#nombres').val(curso)

      var fechaInicio = button.data('apellidos') 
      $('#apellidos').val(fechaInicio)

      var fechaFin = button.data('genero')
      $('#genero').val(fechaFin)
  
      var total_horas = button.data('comuna')
      $('#comuna').val(total_horas)

      var id = button.data('id') 
      $('#id_persona').val(id)
    });

// editar usuario
$('#actualizar_curso').submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/cursoUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#error1").html("Enviando...");
            },
          success: function(datos){
          $('#error1').html(datos);
            $('#error1').show(datos);
             $('#TablaCurso').load('./../ajax/cursoTabla.php');
         
           $('#guardar_curso').modal('hide');
          
        }
      });
      event.preventDefault();
    });

// eliminar usuario
$('#deleteCursoModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$("#delete_curso" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/cursoDelete.php",
          data: parametros,
          success: function(datos){
               $('#TablaCurso').load('./../ajax/cursoTabla.php');
               $('#deleteCursoModal').modal('hide');
          }
      });
      event.preventDefault();
    });


// CRUD COMUNA 
 $("#guardar_comuna").submit(function( event ) {

       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/comunaNuevo.php",
           data: parametros,
            beforeSend: function(objeto){
              $("#mensaje").html("Enviando...");
              },
           success: function(datos){
            $('#mensaje').html(datos);
            $('#mensaje').show(datos);
            
            $('#TablaPersona').load('./../ajax/personaTabla.php');

           }
       });
        event.preventDefault();
     });




// recuperar datos 
$('#EditComuna').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var comuna = button.data('comuna') 
      $('#comuna').val(comuna)

      var id = button.data('id') 
      $('#id_comuna').val(id)
    });

// editar usuario
$('#actualizar_comuna').submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/comunaUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje1").html("Enviando...");
            },
          success: function(datos){
          $('#mensaje1').html(datos);
            $('#mensaje1').show(datos);
             $('#TablaPersona').load('./../ajax/personaTabla.php');
         
           $('#guardar_curso').modal('hide');
          
        }
      });
      event.preventDefault();
    });

// eliminar usuario
$('#deleteComuna').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$("#delete_comuna" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/cursoDelete.php",
          data: parametros,
          success: function(datos){
               $('#TablaCurso').load('./../ajax/cursoTabla.php');
               $('#deleteCursoModal').modal('hide');
          }
      });
      event.preventDefault();
    });