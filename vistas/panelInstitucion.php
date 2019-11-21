<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once 'core.php'; ?>


<?php include_once 'includes/header.php'; ?>
<body>
	<div class="wrapper">
		<?php include_once './includes/navbar.php'; ?>
		<!-- Sidebar -->
		<?php include_once './includes/nav_lateral.php'; ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Agregar cursos</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-md-10">
												
												<input type="text" class="form-control" id="buscar_estudiante" name="buscar_estudiante" placeholder="Buscar estudiante mediante DNI">
												<!-- <select class="form-control input-square" id="listar_institucion" name="listar_institucion">
												</select> -->
											</div>
											<!-- <div class="col-md-2">
												<select class="form-control input-square" id="listar_grado" name="listar_grado">
													<option>1</option>
												</select> 
												
											</div> -->
											<div class="col-md-2">
												<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
											</div>
										</div>	
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
	


			</div>

		</div>
	</div>
<?php include_once './includes/footer.php'; ?>
<script src="./../lib/jquery-1.12.1.min.js"></script>

<script src="./../lib/jquery-ui.js"></script>
<script src="./../assets/js/infocentro/auto.complet.student.js" type="text/javascript"></script>
<script type="text/javascript">
// $(document).ready(function() {
//  	var items = [
//  	"Emilio",
//  	"Adiel",
//  	"Jaramilioo"
//  	]


//  	$('#buscar_estudiante').autocomplete({
//  		source: items
//  	});
//  });
$(document).ready(function() {
 	$('#buscar_estudiante').autocomplete({
 		source: function(request, response) {
 			$.ajax({
 				url: "../ajax/cargar_combobox_grado.php",
 				dataType: "json",
 				data: {q:request.term},
 				success: function(data) {
 					response(data)
 				}
 			});
 		},
 		minLength: 2,
 		select: function(event, ui) {
 			alert("seleccionado" + ui.item.label);
 		}
 	});
 });

</script>