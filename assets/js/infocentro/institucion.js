$('#guardar_institucion').submit(function(e) {
  // remove the error text
    $(".text-danger").remove();
    // remove the form error
    $('.form-group').removeClass('has-error').removeClass('has-success'); 

  var institucion = $('#institucion').val()

  if (institucion == '') {
    $("#institucion").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#institucion').closest('.form-group').addClass('has-error'); 
  }else{
    // remov error text field
      $("#institucion").find('.text-danger').remove();
      // success out for form 
      $("#institucion").closest('.form-group').addClass('has-success'); 
  }

  if (institucion) {
    
    $.ajax({
    type: "POST",
    url: "./../ajax/institucionNuevo.php",
    data: {institucion},
    dataType: 'json',
    success:function(response) {
      if (response.success == true) {
        $("#guardar_institucion")[0].reset();
        // remove the error text
            $(".text-danger").remove();
            // remove the form error
            $('.form-group').removeClass('has-error').removeClass('has-success');

        $('#add-institucion-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
            '</div>');
        $(".alert-success").delay(500).show(10, function() {
              $(this).delay(3000).hide(10, function() {
                $(this).remove();
              });
            }); // /.alert
          $('#tablaInstitucion').load('./../ajax/institucionTabla.php');

      }else{
         $("#institucion").after('<p class="text-danger">'+ response.messages +'</p>');
         $('#institucion').closest('.form-group').addClass('has-error'); 
      }
      

   }
  });
  }
 
	e.preventDefault();
});

// obtener datos 
// recuperar datos 
$('#EditInstitucion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var institucion = button.data('nombre') 
      $('#nombre_institucion').val(institucion)

      var id = button.data('id') 
      $('#id_institucion').val(id)
    });

// editar usuario
$('#actualizar_institucion').submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/institucionUpdate.php",
          data: parametros,
          dataType: 'json',
           beforeSend: function(objeto){
            $("#edit-institucion-messages").html("Enviando...");
            },
          success: function(response){
            if (response.success == true) {
              $('#edit-institucion-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
            '</div>');
              $(".alert-success").delay(500).show(10, function() {
              $(this).delay(2000).hide(10, function() {
                $(this).remove();
              });
            }); 
              console.log(response)
             $('#tablaInstitucion').load('./../ajax/institucionTabla.php');
            }
            
           // $('#EditNivel').modal('hide');
          
        }
      });
      event.preventDefault();
    });

// eliminar usuario
$('#deleteInstitucionModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      $('#id_delete').val(id)
    });

$("#delete_institucion" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "../ajax/institucionDelete.php",
          data: parametros,
          dataType: 'json',
          success: function(response){
            if (response.success == true) {
              $('#tablaInstitucion').load('./../ajax/institucionTabla.php');
               toastr.success('<small>' + response.messages + '</small>', 'Institucion');
              
             $('#deleteInstitucionModal').modal('hide');
            }
              
          }
      });
      event.preventDefault();
    });