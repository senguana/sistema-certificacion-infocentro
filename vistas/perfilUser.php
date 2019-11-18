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
					<h4 class="page-title">User Profile</h4>
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
											<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
										
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Name</label>
												<input type="text" class="form-control" name="name" placeholder="Name" value="Hizrian">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="email" placeholder="Name" value="hello@example.com">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Birth Date</label>
												<input type="text" class="form-control" id="datepicker" name="datepicker" value="03/21/1998" placeholder="Birth Date">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Gender</label>
												<select class="form-control" id="gender">
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Phone</label>
												<input type="text" class="form-control" value="+62008765678" name="phone" placeholder="Phone">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Address</label>
												<input type="text" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
											</div>
										</div>
									</div>
									<div class="row mt-3 mb-1">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>About Me</label>
												<textarea class="form-control" name="about" placeholder="About Me" rows="3">A man who hates loneliness</textarea>
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success">Save</button>
										<button class="btn btn-danger">Reset</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-profile card-secondary">
								<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name">Hizrian, 19</div>
										<div class="job">Frontend Developer</div>
										<div class="desc">A man who hates loneliness</div>
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