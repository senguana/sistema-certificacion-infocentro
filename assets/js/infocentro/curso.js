 $(document).ready(function() {
  fetchArray()
  $('#basic-datatables').DataTable({});


 });

 function fetchArray() {
  $.ajax({
    url: './../ajax/cursoTabla.php',
    type: 'GET',
    success: function(response) {
      let courses = JSON.parse(response)
      let template = '';

      courses.forEach(course =>{
        template += `
        <tr>
          <td>${course.nameCurso}</td>
          <td>${course.fechaInicio}</td>
          <td>${course.fechaFin}</td>
          <td>${course.totalHoras}</td>
          <td>${course.nameTeacher}</td>
          <td>
            <div class="form-button-action">
              <button type="button"  data-toggle="modal" data-target="#EditCurso" title="Editar" class="btn btn-link btn-success" data-id = '${course.id}' data-curso='${course.nameCurso}' data-fechaInicio= '${course.fechaInicio}' data-fechaFin = '${course.fechaFin}' data-horas = '${course.totalHoras}' data-docente = '${course.nameTeacher}'> <i class="fa fa-edit"></i>
              </button>
              <button type="button" data-toggle="modal" data-target="#deleteCursoModal" title="" class="btn btn-link btn-warning" data-id="${course.id}"  data-original-title="Remove"><i class="fa fa-trash"></i>
              </button>

            </div>
          </td> 
        </tr>
        `
        $('#TableCourse').html(template)
      })

      
    }
  })
 }
 $("#guardar_curso_form" ).submit(function( event ) {
  // remove the error text
  $(".text-danger").remove();
    // remove the form error
  $('.form-group').removeClass('has-error').removeClass('has-success'); 
  var nameCurso   = $('#nameCurso').val();
  var dateStart   = $('#fechaInicio').val();
  var dateEnd     = $('#fechaFin').val();
  var totalHoras  = $('#totalHoras').val();
  var nameTeacher = $('#nameTeacher').val();

   const sendData = {
        nameCurso: nameCurso,
        fechaInicio: dateStart,
        fechaFin: dateEnd,
        totalHoras: totalHoras ,
        nameTeacher: nameTeacher
      };
  

  if (nameCurso == '') {
    $("#nameCurso").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#nameCurso').closest('.form-group').addClass('has-error');
  }else{

      $("#nameCurso").find('.text-danger').remove();
      $("#nameCurso").closest('.form-group').addClass('has-success');
  }
  if (dateStart == '') {
    $("#fechaInicio").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#fechaInicio').closest('.form-group').addClass('has-error');
  }else{

      $("#fechaInicio").find('.text-danger').remove();
      $("#fechaInicio").closest('.form-group').addClass('has-success');
  }
  if (dateEnd == '') {
    $("#fechaFin").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#fechaFin').closest('.form-group').addClass('has-error');
  }else{

      $("#fechaFin").find('.text-danger').remove();
      $("#fechaFin").closest('.form-group').addClass('has-success');
  }
  if (totalHoras == '') {
    $("#totalHoras").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#totalHoras').closest('.form-group').addClass('has-error');
  }else{

      $("#totalHoras").find('.text-danger').remove();
      $("#totalHoras").closest('.form-group').addClass('has-success');
  }
  if (nameTeacher == '') {
    $("#nameTeacher").after('<p class="text-danger">Este campo es obligatorio</p>');
    $('#nameTeacher').closest('.form-group').addClass('has-error');
  }else{

      $("#nameTeacher").find('.text-danger').remove();
      $("#nameTeacher").closest('.form-group').addClass('has-success');
  }
  if (nameCurso && fechaInicio && fechaFin && totalHoras && nameTeacher) {
    
      $.ajax({
          type: "POST",
          url: "../ajax/cursoNuevo.php",
          data: sendData,
          dataType: 'json',
         
          success: function(response){
            if (response.success == true) {
              $("#guardar_curso_form")[0].reset();
              // remove the error text
                  $(".text-danger").remove();
                  // remove the form error
                  $('.form-group').removeClass('has-error').removeClass('has-success');

              $('#add-course-messages').html('<div class="alert alert-success">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                  '</div>');
              $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                      $(this).remove();
                    });
                  }); // /.alert
                fetchArray()
            }
          
             
             $('#guardar_curso').modal('hide');
          
        }
      });
  }
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
            fetchArray()
         
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
               fetchArray()
               $('#deleteCursoModal').modal('hide');
          }
      });
      event.preventDefault();
    });