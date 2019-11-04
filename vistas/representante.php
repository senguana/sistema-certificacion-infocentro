<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php 
$consulta = "SELECT * FROM representante r INNER JOIN profesion p ON r.cod_profesion = p.id_profesion";

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
								<a href="#">Representantes</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title">Registro Representantes</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#NuevoRepresentante">
											<i class="fa fa-plus"></i>
											Nuevo Representante
										</button>
									</div>
								</div>	
								<div class="card-body">
										<p class="small" id="resultado"></p>
										
									<?php 
									include("./../modal/modalCrudRepresentante.php");
									 ?>
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover"  >
											<thead>
												<tr>
													<!-- <th>#</th> -->
													<th>Dni</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Telefono</th>
													<th>Profesion</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($result as $dato): ?>
												<tr>
													
													<td><?php echo $dato['dni_repre']; ?></td>
													<td><?php echo $dato['nombres_repre']; ?></td>
													<td><?php echo $dato['apellidos_repre']; ?></td>
													<td><?php echo $dato['telefono_repre']; ?></td>
													<td><?php echo $dato['nombre_profesion']; ?></td>
													<td>
														<div class="form-button-action">
	<button type="button"  data-toggle="modal" data-target="#EditRepresentante" title="Editar" class="btn btn-link btn-primary" data-dni = '<?php echo $dato['dni_repre']; ?>' data-nombre='<?php echo $dato['nombres_repre']; ?>' data-apellido= '<?php echo $dato['apellidos_repre']; ?>' data-correo='<?php echo $dato['telefono_repre']; ?>' data-profesion='<?php echo $dato['cod_profesion']; ?>' data-id='<?php echo $dato['id_repre']; ?>' id="Edit">
		<i class="fa fa-edit"></i>
	</button>
	<button type="button" data-toggle="modal" data-target="#deleteRepresentanteModal" title="" class="btn btn-link btn-danger" data-id="<?php echo $dato['id_repre'];?>"  data-original-title="Remove">
								<i class="fa fa-times"></i>
							</button>



	 

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
<script src="./../assets/js/infocentro/representante.js" type="text/javascript" charset="utf-8" async defer></script>

