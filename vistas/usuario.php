<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php 
// $consulta = "SELECT *  FROM usuario u INNER JOIN profesion p ON u.profesion = p.id_profesion WHERE estado = 1 ORDER BY id_usua ASC";

// $query_listar = $db->prepare($consulta);
// $query_listar->execute();

// $result = $query_listar->fetchAll();
 ?>
<body>
	<div class="wrapper">
		<?php include_once './includes/navbar.php'; ?>
		<!-- Sidebar -->
		<?php include_once './includes/nav_lateral.php'; ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#"><i class="flaticon-home"></i></a>
							</li>
							<li class="separator"><i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item"><a href="#">usuario</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Registro Usuario</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Nuevo Usuario
										</button>
									</div>
								</div>	
								<div class="card-body">
									<p class="small" id="resultado"></p>
										
									<?php 
									include("./../modal/modalCrudUsuario.php");
									 ?>
									 <div id="resultadoTablaUsuario"></div> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
<?php include_once 'includes/footer.php'; ?>
<script type="text/javascript" charset="utf-8" async defer>
	$('document').ready(function() {
		$('#resultadoTablaUsuario').load('./../ajax/usuarioTabla.php');
	})
</script>