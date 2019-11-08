<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php 
$consulta = "SELECT *  FROM curso c INNER JOIN docente d ON c.docente_id = d.id_docente ORDER BY id_curso ASC";

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
								<a href="#">Cursos</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title">Registro de los Cursos</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#NuevoCurso">
											<i class="fa fa-plus"></i>
											Nuevo Curso
										</button>
									</div>
								</div>	
								<div class="card-body">
										
										
									<?php 
									include("./../modal/modalCrudCurso.php");
									 ?>
									<div class="table-responsive" id="tablaRepre">
										<table id="basic-datatables" class="display table table-striped table-hover"  >
											<thead>
												<tr>
													<!-- <th>#</th> -->
													<!-- <th>Dni</th> -->
													<th>Curso</th>
													<th>Fecha Inicio</th>
													<th>Fecha Final</th>
													<th>Total Horas</th>
													<th>Docente</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($result as $dato): ?>
												<tr>
													
													<td><?php echo $dato['nombre_curso']; ?></td>
													<td><?php echo $dato['fecha_inicio']; ?></td>
													<td><?php echo $dato['fecha_fin']; ?></td>
													<td><?php echo $dato['total_horas']; ?></td>
													<td><?php echo $dato['nombre'] ." " . $dato['apellido']; ?></td>
													<td>
														<div class="form-button-action">
	<button type="button"  data-toggle="modal" data-target="#EditDocente" title="Editar" class="btn btn-link btn-primary" data-id='<?php echo $dato['id_curso']; ?>' id="Edit">
		<i class="fa fa-edit"></i>
	</button>
	<button type="button" data-toggle="modal" data-target="#deleteDocenteModal" title="" class="btn btn-link btn-danger" data-id="<?php echo $dato['id_curso'];?>"  data-original-title="Remove">
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
