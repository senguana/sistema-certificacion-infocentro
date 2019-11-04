<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="NuevoRepresentante" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Representante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="add-brand-messages"></div>
				<form id="guardarRepresentante" name="guardarRepresentante" autocomplete="off"   accept-charset="utf-8">
					<div class="row">
						<div class="col-sm-6">
							<p id="error"></p>
						
						</div>

					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group form-inline">
								<label for="dni_usua"  class="col-md-3 col-form-label">DNI</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="dni_repre" placeholder="Ingrese nùmero de cedula" required="">
								</div>
							</div>
							
							<div class="form-group form-inline">
								<label for="apell_repre"  class="col-md-3 col-form-label">Apellido</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="apell_repre" placeholder="Ingrese apellido" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="genero_repre"  class="col-md-3 col-form-label">Gènero</label>
								<div class="col-md-9 p-0">
									<select class="form-control input-square" name="genero_repre" >
										<option value="0" selected>Seleccionar...</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									
									</select>
								</div>
							</div>
					
						</div>
						<div class="col-sm-6">
							<div class="form-group form-inline">
								<label for="nombre_usua"  class="col-md-3 col-form-label">Nombre</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="nombre_repre" placeholder="Ingrese nombre" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="repre_tel"  class="col-md-3 col-form-label">Telèfono</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="repre_tel" placeholder="Ingrese telèfono" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="profesion_repre"  class="col-md-3 col-form-label">Profesiòn</label>
								<div class="col-md-9 p-0">
									<select class="form-control input-square" name="profesion_repre" >
										<option value="0" selected>Seleccionar...</option>
									<?php 
									$sql = "SELECT id_profesion, nombre_profesion from profesion ";
									$stmt = $db->prepare($sql);
									$result_consulta = $stmt->execute();
									$cargar_datos = $stmt->fetchAll(PDO::FETCH_OBJ);	 
									foreach ($cargar_datos as $dato) {
										?>
										<option value="<?php echo $dato->id_profesion;?> "><?php echo $dato->nombre_profesion; ?></option>
									
										<?php 
									}
									 ?>
									
									</select>
								</div>
							</div>					
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" name="guardar_datos" id="guardar_datos"  class="btn btn-primary">Crear Representante</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<!-- MODAL ACTUALIZAR  -->
<div class="modal fade  bd-example-modal-lg" id="EditRepresentante">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="editar_usuario" name="editar_usuario" autocomplete="off"   accept-charset="utf-8">
					<div class="row">
						<div class="col-sm-6">
							<p id="error"></p>
							<div class="form-group form-inline">
								<label for="dni_usua"  class="col-md-3 col-form-label">DNI</label>
								<div class="col-md-9 p-0">
									<input type="hidden" name="id_user" id="id_user" class="form-control">
									<input type="text" class="form-control input-full" name="dni_usua" id="dni_usua" placeholder="Ingrese nùmero de cedula" required="">
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group form-inline">
								<label for="nombre_usua"  class="col-md-3 col-form-label">Nombre</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="nombre_usua" id="nombre_usua" placeholder="Ingrese nombre" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="apell_usua"  class="col-md-3 col-form-label">Apellido</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="apell_usua" id="apell_usua" placeholder="Ingrese apellido" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="correo_usua"  class="col-md-3 col-form-label">Correo</label>
								<div class="col-md-9 p-0">
									<input type="email" class="form-control input-full" name="correo_usua" id="correo_usua" placeholder="Ingrese correo" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="genero_usua"  class="col-md-3 col-form-label">Gènero</label>
								<div class="col-md-9 p-0">
									<select class="form-control input-square" name="genero_usua" id="genero_usua" >
										<option value="0" selected>Seleccionar...</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									
									</select>
								</div>
							</div>
					
						</div>
						<div class="col-sm-6">
							<div class="form-group form-inline">
								<label for="profesion_usua"  class="col-md-3 col-form-label">Profesiòn</label>
								<div class="col-md-9 p-0">
									<select class="form-control input-square" name="profesion_usua" id="profesion_usua" >
										<option value="0" selected>Seleccionar...</option>
									<?php 
									$sql = "SELECT id_profesion, nombre_profesion from profesion ";
									$stmt = $db->prepare($sql);
									$result_consulta = $stmt->execute();
									$cargar_datos = $stmt->fetchAll(PDO::FETCH_OBJ);	 
									foreach ($cargar_datos as $dato) {
										?>
										<option value="<?php echo $dato->id_profesion;?> "><?php echo $dato->nombre_profesion; ?></option>
									
										<?php 
									}
									 ?>
									
									</select>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="usuario_usua"  class="col-md-3 col-form-label">Usuario</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="usuario_usua" id="usuario_usua" placeholder="usuario" required>
								</div>
							</div>
							<div class="form-group form-inline">
								<label for="password_usua"  class="col-md-3 col-form-label">Password</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="password_usua" placeholder="************" required="">
								</div>
							</div>
							<div class="form-group form-inline ">
								<label for="confirmpassword"  class="col-md-3 col-form-label">Confirmar <br>Password</label>
								<div class="col-md-9 p-0">
									<input type="text" class="form-control input-full" name="confirmpassword" placeholder="************" required="">
								</div>
							</div>					
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" name="actualizar_datos" id="actualizar_datos"  class="btn btn-primary">Actualizar usuario</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<!-- ELIMINAR REPRESENTANTE -->
<div id="deleteRepresentanteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="delete_representante" id="delete_representante">
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar Representante</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>¿Seguro que quieres eliminar este registro?</p>
					<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
					<input type="text" name="delete_id" id="delete_id">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>