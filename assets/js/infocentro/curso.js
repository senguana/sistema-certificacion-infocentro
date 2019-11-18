 $("#guardar_curso" ).submit(function( event ) {
       var parametros = $(this).serialize();
       $.ajax({
           type: "POST",
           url: "../ajax/cursoNuevo.php",
           data: parametros,
            // beforeSend: function(objeto){
            //  $("#error").html("Enviando...");
            //  },
           success: function(datos){
            $('#msg_error').html(datos);
           if (datos) {
            toastr.success('Se ha registrado correctamente', 'representante');
           }else{
            toastr.warning('No se ha podido guardar', 'Representante')
           }

           $('#guardar_curso').modal('hide');
           }
       });
       event.preventDefault();
     });




// recuperar datos 
$('#EditCurso').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var curso = button.data('curso') 
      $('#curso').val(curso)

      var fechaInicio = button.data('fechaInicio') 
      $('#fecha_inicio').val(fechaInicio)

      var fechaFin = button.data('fechaFin')
      $('#fecha_fin').val(fechaFin)
  
      var total_horas = button.data('horas')
      $('#total_horas').val(total_horas)

       var docente = button.data('docente')
      $('#docente').val(docente)

      var id = button.data('id') 
      $('#id_curso').val(id)
    });

// editar usuario
$( "#editar_curso" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/cursoUpdate.php",
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