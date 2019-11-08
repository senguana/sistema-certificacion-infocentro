<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php
// $consulta = "SELECT *  FROM usuario u INNER JOIN profesion p ON u.profesion = p.id_profesion WHERE estado = 1 ORDER BY id_usua ASC"
// 
$consulta = "SELECT *  FROM alumno_basica a INNER JOIN institucion i ON a.institucion_id = i.id_institucion INNER JOIN grado g ON a.grado_id = g.id_grado";

$query_listar = $db->prepare($consulta);
$query_listar->execute();


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
								<a href="#">Alumnos</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title">Registro de Alumnos de Básica</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#NuevoAlumnoBasica">
											<i class="fa fa-plus"></i>
											Nuevo Alumno
										</button>
									</div>
								</div>	
								<div class="card-body">
										
										
									<?php 
									include("./../modal/modalCrudAlumnoBasica.php");
									 ?>
									<div class="table-responsive" id="tablaRepre">
										<table id="basic-datatables" class="display table table-striped table-hover"  >
											<thead>
												<tr>
													<!-- <th>#</th> -->
													<th>Dni</th> 
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Género</th>
													<th>Edad</th>
													<th>Fecha Nac.</th>
													<th>Institucion</th>
													<th>Grado</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php while ($result = $query_listar->fetch(PDO::FETCH_OBJ)) {?>
													<tr>
													
													<td><?php echo $result->dni_alum_s; ?></td>
													<td><?php echo $result->nombres_alum_s; ?></td>
													<td><?php echo $result->apellidos_alumn_s; ?></td>
													<td><?php echo $result->genero; ?></td>
													<td><?php echo $result->edad; ?></td>
													<td><?php echo $result->fech_nac; ?></td>
													<td><?php echo $result->nombre_institucion; ?></td>
													<td><?php echo $result->descripcion; ?></td>
													<td>

														<div class="form-button-action">
	<button type="button"  data-toggle="modal" data-target="#EditDocente" title="Editar" class="btn btn-link btn-primary" id="Edit">
		<i class="fa fa-edit"></i>
	</button>
	<button type="button" data-toggle="modal" data-target="#deleteDocenteModal" title="" class="btn btn-link btn-danger"   data-original-title="Remove">
								<i class="fa fa-times"></i>
							</button>
														</div>
													</td>
													
												</tr>
											<?php	}

												 ?>
												
								
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
