<div class="modal fade" id="NuevaComuna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Nuevo Comuna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger" id="mensaje"></div>
			<div class="modal-body">
				<form id="guardar_comuna">
					<div class="form-group">
						<label for="comuna">Comuna</label>
						
						<input type="text" class="form-control" name="comuna" placeholder="Ingrese comuna">
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</form>

			</div>
			
		</div>
	</div>
</div>
<div class="modal fade" id="EditComuna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar Comuna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="mensaje1"></div>
			<div class="modal-body">
				<form id="actualizar_comuna">
					<div class="form-group">
						<label for="comuna">Comuna</label>
						<input type="text" name="id_comuna" id="id_comuna" hidden="">
						<input type="text" class="form-control" name="edit_comuna" id="edit_comuna"  placeholder="Ingrese comuna">
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</form>

			</div>
			
		</div>
	</div>
</div>