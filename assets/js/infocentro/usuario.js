$( "#guardar_usuario" ).submit(function( event ) {
  $('#guardarDatos').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardarDatos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})