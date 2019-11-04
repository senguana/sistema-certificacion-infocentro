<div class="sidebar">
	<div class="sidebar-background"></div>
	<div class="sidebar-wrapper scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?php echo SERVERURL; ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php echo $_SESSION['username_usua']; ?>
							<span class="user-level">Administrator</span>
						</span>
					</a>
					
				</div>
			</div>
			<ul class="nav">
				<li class="nav-item active">
					<a href="home.php">
						<i class="fas fa-home"></i>
						<p>Inicio</p>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#charts">
						<i class="far fa-chart-bar"></i>
						<p>aDMINISTRADOR</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="charts">
						<ul class="nav nav-collapse">
							<li>
								<a href="charts/charts.html">
									<span class="sub-item">Asignar Cursos</span>
								</a>
							</li>
							<li>
								<a href="charts/sparkline.html">
									<span class="sub-item">Generar Certificados</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a href="./usuario.php">
						<i class="fas fa-user"></i>
						<p>Usuario</p>
						
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Estuadiante</p>
						
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Docente</p>
						
					</a>
				</li>
				<li class="nav-item">
					<a href="./representante.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<p>Representantes</p>
						
					</a>
				
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#maps">
						<i class="fas fa-map-marker-alt"></i>
						<p>Cursos</p>
						
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>