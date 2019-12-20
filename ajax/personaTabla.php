
<?php
 include_once './../bd/conexion.php'; 

  $query = "SELECT `id_per`,dni, `nombres_per`, `apellidos_per`, `genero_per`, id_comuna, descripcion FROM personas p INNER JOIN comuna c ON p.comuna = c.id_comuna  ORDER BY id_per DESC";
 
 $stmt = $db->prepare($query);
 $stmt->execute();
 ?>
 <div class="table-responsive">
	<table id="basic-datatables" class="display table table-striped table-hover"  >
		<thead>
			<tr>
				<th>DNI</th> 
				<th>Nombres</th> 
				<th>Apellidos</th>
				<th>Genero</th>
				<th>Comuna</th>
				<th style="width: 10%">Action</th>
			</tr>
		</thead>
 
 <tbody>

 <?php while($row=$stmt->fetch(PDO::FETCH_OBJ)){ ?>
 	
		<tr>
			<td><?php echo $row->dni; ?></td>
			<td><?php echo $row->nombres_per; ?></td>
			<td><?php echo $row->apellidos_per; ?></td>
			<td><?php echo $row->genero_per; ?></td>
			<td><div class="btn-group dropright">
					<button type="button" class="btn btn-success btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $row->descripcion; ?>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						<a class="dropdown-item" data-toggle="modal" data-target="#EditComuna" data-id="<?php echo $row->id_comuna; ?>" data-comuna="<?php echo $row->descripcion; ?>"><i class="fas fa-edit"></i>Editar</a>
						<div class="dropdown-divider"></div>
					</ul>
				</div></td>
			<td>
				<div class="form-button-action">
					<button type="button"  data-toggle="modal" data-target="#EditPersona" title="Editar" class="btn btn-link btn-success" data-id = '<?php echo $row->id_per; ?>' data-dni='<?php echo $row->dni; ?>' data-nombres='<?php echo $row->nombres_per; ?>' data-apellidos = '<?php echo $row->apellidos_per; ?>' data-genero='<?php echo $row->genero_per; ?>' data-comuna='<?php echo $row->descripcion; ?>'   id="Edit"><i class="fa fa-edit"></i></button>
					<button type="button" data-toggle="modal" data-target="#deletePersona" title="" class="btn btn-link btn-danger" data-id="<?php echo $row->id_per;?>"  data-original-title="Remove"><i class="fa fa-trash"></i></button>
					
					<button type="button" data-toggle="modal" data-target="#agregarCursoPersona" title="" class="btn btn-link btn-primary" data-id="<?php echo $row->id_per;?>"  data-original-title="Asignar cursos"><i class='fas fa-plus-square'></i></button>
					
				
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});
			
		});
	</script>

 

