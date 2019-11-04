<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php 
$consulta = "SELECT *  FROM usuario u INNER JOIN profesion p ON u.profesion = p.id_profesion WHERE estado = 1 ORDER BY id_usua ASC";

$query_listar = $db->prepare($consulta);
$query_listar->execute();

$result = $query_listar->fetchAll();
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
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">usuario</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title">Registro Usuario</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Nuevo Usuario
										</button>
									</div>
								</div>	
								<div class="card-body">
										<p class="small" id="resultado"></p>
										
									<?php 
									include("./../modal/modalCrudUsuario.php");
									 ?>
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover"  >
											<thead>
												<tr>
													<!-- <th>#</th> -->
													<th>Dni</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Correo</th>
													<th>Genero</th>
													<th>Usuario</th>
													<th>Profesion</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($result as $dato): ?>
												<tr>
													
													<td><?php echo $dato['dni_usua']; ?></td>
													<td><?php echo $dato['nombre_usua']; ?></td>
													<td><?php echo $dato['apellido_usua']; ?></td>
													<td><?php echo $dato['correo_usua']; ?></td>
													<td><?php echo $dato['genero_usua']; ?></td>
													<td><?php echo $dato['username_usua']; ?></td>
													<td><?php echo $dato['nombre_profesion']; ?></td>
													<td>
														<div class="form-button-action">
	<button type="button"  data-toggle="modal" data-target="#EditUsuario" title="Editar" class="btn btn-link btn-primary" data-dni = '<?php echo $dato['dni_usua']; ?>' data-nombre='<?php echo $dato['nombre_usua']; ?>' data-apellido= '<?php echo $dato['apellido_usua']; ?>' data-correo='<?php echo $dato['correo_usua']; ?>' data-genero='<?php echo $dato['genero_usua']; ?>' data-user='<?php echo $dato['username_usua']; ?>' data-profesion='<?php echo $dato['profesion']; ?>' data-id='<?php echo $dato['id_usua']; ?>' id="Edit">
		<i class="fa fa-edit"></i>
	</button>
<?php 
if ($dato["id_usua"]!=1) {?>
	
	<button type="button" data-toggle="modal" data-target="#deleteUsuarioModal" title="" class="btn btn-link btn-danger" data-id="<?php echo $dato['id_usua'];?>"  data-original-title="Remove">
								<i class="fa fa-times"></i>
							</button>
<?php } ?>



	 

														</div>
													</td>
													
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
<?php include_once 'includes/footer.php'; ?>

