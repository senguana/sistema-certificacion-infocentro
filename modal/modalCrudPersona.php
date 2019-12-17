<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="NuevaPersona" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva Persona</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div  id="error" class="btn-danger" style="display: none; height: 30px; padding: 5px; text-align: center; border-radius: 2px;">	
				</div>
				<form id="guardar_persona" name="guardar_persona" autocomplete="off"   accept-charset="utf-8">
					<div class="row">
						<b id="msg_error"></b>
						<div class="col-md-12">
							<div class="form-group">
								<label for="curso">Nombres</label>
								<input type="text" class="form-control" name="nombres"  placeholder="Ingrese nombres">
							</div>
							<div class="form-group">
								<label for="apellidos">Apellidos</label>
								<input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos" >
							</div>
							<div class="form-group">
								<label for="genero" class="col-md-2 col-form-label">Gènero</label>
									<select class="form-control" name="genero">
										<option disabled="" selected="">Seleccionar...</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
								
							</div>
						
							<div class="form-group">
								<label for="comuna">Seleccionar comuna</label>
								<select class="form-control" class="comuna" name="comuna">
									<option value="" disabled="" selected="">Seleccionar...</option>
									
									<?php 
									$sql = "SELECT id_comuna, descripcion FROM comuna";
									$stmt = $db->prepare($sql);
									$result_consulta = $stmt->execute();
									while ($cargar_datos = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
										<option value="<?php echo $cargar_datos->id_comuna;?> "><?php echo $cargar_datos->descripcion;?></option>
										
										
									<?php 
								}
									
									 ?>
								
								</select>
							</div>

					
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" id="guardar_datos" class="btn btn-primary float-right mt-3 mt-sm-0 fw-bold" >Nueva comuna</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

<!-- EDITAR CURSO -->
<div class="modal fade  bd-example-modal-lg" id="EditPersona" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar Curso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div  id="error1" class="btn-warning" style="display: none; height: 30px; padding: 5px; text-align: center; border-radius: 2px;">	
				</div>
				<form id="actualizar_persona" name="actualizar_persona" autocomplete="off"   accept-charset="utf-8">
					<div class="row">
						<b id="msg_error"></b>
						<div class="col-md-12">
							<div class="form-group">
								<label for="curso">Nombres</label>
								<input type="text" name="id_persona" id="id_persona">
								<input type="text" class="form-control" name="nombres" id="nombres"  placeholder="Ingrese nombres">
							</div>
							<div class="form-group">
								<label for="apellidos">Apellidos</label>
								<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese apellidos" >
							</div>
							<div class="form-group">
								<label for="genero">Genero</label>
								<input type="text" class="form-control" name="genero" id="genero" placeholder="Ingrese genero">
							</div>
							<div class="form-group">
								<label for="comuna">Seleccionar comuna</label>
								<select class="form-control" name="comuna" id="comuna">
									<option value="" selected="">Seleccionar...</option>
									
									<?php 
									$sql = "SELECT id_comuna, descripcion FROM comuna";
									$stmt = $db->prepare($sql);
									$result_consulta = $stmt->execute();
									while ($cargar_datos = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
										<option value="<?php echo $cargar_datos->id_comuna;?> "><?php echo $cargar_datos->descripcion;?></option>
										
										
									<?php 
								}
									
									 ?>
								
								</select>
							</div>

					
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-primary float-right mt-3 mt-sm-0 fw-bold" >Actualizar comuna</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<!-- ELIMINAR USUARIO -->
<div id="deletePersona" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="delete_persona" id="delete_persona">
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar Persona</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>¿Seguro que quieres eliminar este registro?</p>
					<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
					<input type="text" hidden="" name="delete_id" id="delete_id">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>