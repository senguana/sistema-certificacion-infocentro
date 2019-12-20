
<?php
 include_once './../bd/conexion.php'; 

  $query = "SELECT p.id_per, p.dni, p.nombres_per, p.apellidos_per, p.genero_per, c.nombre_curso, c.total_horas, curso_id, ad.estado FROM add_curso_estudiante ad INNER JOIN personas p ON ad.persona_id = p.id_per INNER JOIN curso c ON ad.curso_id = c.id_curso WHERE ad.estado = 1 GROUP BY nombre_curso, nombres_per ORDER BY id_add ";
 
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
				<th>Curso</th>
				<th>Hora</th>
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
				<td><?php echo $row->nombre_curso;?></td>
				<td><?php echo $row->total_horas; ?></td>
				<td>
					<div class="card-tools">
						<button type="submit" id="generarCertificado" dni="<?php echo $row->dni; ?>" curso="<?php echo $row->curso_id; ?>" id="verAlumnoCurso" class="btn btn-info btn-border btn-round btn-sm"><span class="btn-label"><i class="fa fa-print"></i>Generar certificado</span></button>
					</div>
				</td>
			</tr><?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
		$('#basic-datatables').DataTable({
			});
	</script>


 

