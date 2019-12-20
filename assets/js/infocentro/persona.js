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
      var dni = button.data('dni');
      $('#dni').val(dni)
      
      var nombres = button.data('nombres') 
      $('#nombres').val(nombres)

      var apellidos = button.data('apellidos') 
      $('#apellidos').val(apellidos)

      var genero = button.data('genero')
      $('#genero').val(genero)
  
      var comuna = button.data('comuna')
      $('#comuna').val(comuna)

      var id_persona = button.data('id') 
      $('#id_persona').val(id_persona)
    });

// editar PERSONA
$('#actualizar_persona').submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/personaUpdate.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#error1").html("Enviando...");
            },
          success: function(datos){
           $('#error1').html(datos);
             $('#error1').show(datos);
              $('#TablaPersona').load('./../ajax/personaTabla.php');
          
        }
      });
      event.preventDefault();
    });

// eliminar PERSONA
$('#deletePersona').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#delete_id').val(id)
    });

$("#delete_persona" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/personaDelete.php",
          data: parametros,
          success: function(datos){
               $('#TablaPersona').load('./../ajax/personaTabla.php');
               $('#deletePersona').modal('hide');
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
      $('#edit_comuna').val(comuna)

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



//ASIGNAR CURSOS 
$('#agregarCursoPersona').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id');
      $('#persona_id').val(id)
    });

// agregar cursos a los alumnos 

$('#asignar_curso_persona').submit(function(event){
  event.preventDefault();
  var persona = $('#persona_id').val();
  var curso = $('#seleccionarCurso').val();

  var datos = {"persona":persona, "curso":curso}
  if(curso ==""){
    alert("Debes seleccionar el curso")
  }else{
    $.ajax({
      url: './../ajax/asignarCursoPersona.php',
      type: 'POST',
      data: datos,
      beforeSend: function(objeto){
        $('#response').html('Enviado');
        $('#response').show(datos)
      },
      success: function(datos){
        $('#response').html(datos);
        $('#response').show(datos)
      }
    })
  }

})