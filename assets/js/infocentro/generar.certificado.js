$(document).ready(function() {
	$('#generarCertificado').click(function(e) {
		e.preventDefault();
		var dni = $(this).attr('dni');
		var curso = $(this).attr('curso');

		generarPDF(dni, curso);

	})
})


function generarPDF(dni, curso) {
	var ancho = 1200;
	var alto = 800;

	var x = parseInt((window.screen.width/2)-(ancho/2));
	var y = parseInt((window.screen.width/2)-(alto/2));

	$url = 'certificado/generarCertificadoPersona.php?dni='+dni+'&curso='+curso;
	window.open($url, "Certificado", "left="+x+",top="+y+", height="+alto+", width="+ancho+",scrollbar=si, location=no, resizable=si, nombar=no");

}