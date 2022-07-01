<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar pacientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar pacientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" type="button" name="add_button" id="add_button">
          
          Agregar pacientes

        </button>

      </div>

      <div class="box-body">
        
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
								<th>Curp</th>
								<th>Matricula</th>
								<th>Prog. Educativo</th>
								<th>Nombre</th>
								<th>Paterno</th>
								<th>Materno</th>
								<th>T. Sanguineo</th>
								<th>Discapacidad</th>
								<th>Género</th>
								<th>Fec. Nac.</th>
								<th>Editar</th>
								<th>Borrar</th>

         </tr> 

        </thead>

        <tbody>


<?php

//fetchPaciente.php

$api_url = "http://localhost/medico/vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->id.'</td>
			<td>'.$row->curp.'</td>
			<td>'.$row->matricula.'</td>
			<td>'.$row->descripcion.'</td>
			<td>'.$row->nombre.'</td>
			<td>'.$row->paterno.'</td>
			<td>'.$row->materno.'</td>
			<td>'.$row->tipo_sanguineo.'</td>
			<td>'.$row->discapacidad.'</td>
			<td>'.$row->genero.'</td>
			<td>'.$row->fecha_nacimiento.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Editar</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Borrar</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="16" align="center">No se encontro información</td>
	</tr>
	';
}

echo $output;

?>
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Agregar Información</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Ingresa la CURP</label>
			        	<input type="text" name="curp" id="curp" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa la Matricula</label>
			        	<input type="text" name="matricula" id="matricula" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Selecciona el programa educativo</label>

				<select class="form-control" id="id_programa" name="id_programa" required>
						<option value="0">-Selecciona el programa educativo</option>

							<?php

							//fetch.php

$api_url = "http://localhost/medico//vistas/modulos/ProgramaEducativo/api/test_api.php?action=fetch_all";

								$client = curl_init($api_url);

								curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

								$response = curl_exec($client);

								$result = json_decode($response);

								$output = '';

								if(count($result) > 0){
									foreach($result as $row){
										$output .= '<option value="' .$row->id. '">' 
										            .$row->id
										            .'.- '
										            .ucfirst(strtolower($row->descripcion))
										            . '</option>';
									}
								}
									else{
										$output .= '<option value="-1">No se encontraron elementos</option>';
									}

								echo $output;
							?>
						</select> 


			        </div>
		      		<div class="form-group">
			        	<label>Ingresa el nombre</label>
			        	<input type="text" name="nombre" id="nombre" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa el apellido paterno</label>
			        	<input type="text" name="paterno" id="paterno" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa el apellido materno</label>
			        	<input type="text" name="materno" id="materno" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa el tipo sanguineo</label>
			        	<input type="text" name="tipo_sanguineo" id="tipo_sanguineo" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa la discapacidad del paciente</label>
			        	<input type="text" name="discapacidad" id="discapacidad" class="form-control" />
			        </div>

			        <div class="form-group">
			        	<label>Seleccione el género</label>
			        	<select class="form-control" id="genero" name="genero" required>
							<option value="M">-Selecciona el género</option>
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
			        	</select> 
			        </div>
			        <div class="form-group">
			        	<label>Ingresa la fecha de nacimiento YYYY-MM-DD</label>
			        	<input type="text" name="fecha" id="fecha" class="form-control" placeholder="Ingresa la fecha de nacimiento YYYY-MM-DD" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa el lugar de origen CDMX</label>
			        	<input type="text" name="origen" id="origen" class="form-control" placeholder="Ingresa el lugar de origen CDMX" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa el estado "Hidalgo"</label>
			        	<input type="text" name="estado" id="estado" class="form-control" placeholder="Ingresa el estado Hidalgo" />
			        </div>
			        <div class="form-group">
			        	<label>Ingresa la Residencia</label>
			        	<input type="text" name="residencia" id="residencia" class="form-control" />
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"vistas/modulos/paciente/work/fetchPaciente.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Agregar información');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#matricula').val() == '')
		{
			alert("Ingresa la matricula");
		}
		else if($('#curp').val() == '')
		{
			alert("Ingresa la curp");
		}
		else if($('#nombre').val() == '')
		{
			alert("Ingresa el nombre");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"vistas/modulos/paciente/work/actionPaciente.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Registró insertado correctamente");
					}
					if(data == 'update')
					{
						alert("Información actualizada");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"vistas/modulos/paciente/work/actionPaciente.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#curp').val(data.curp);
				$('#matricula').val(data.matricula);
				$('#id_programa').val(data.id_programa);
				$('#nombre').val(data.nombre);
				$('#paterno').val(data.paterno);
				$('#materno').val(data.materno);
				$('#tipo_sanguineo').val(data.tipo_sanguineo);
				$('#discapacidad').val(data.discapacidad);
				$('#genero').val(data.genero);
				$('#fecha').val(data.fecha);
				$('#origen').val(data.lugar_origen);
				$('#estado').val(data.estado);
				$('#residencia').val(data.residencia);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Editar información');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Estas seguro de borrar este registró?"))
		{
			$.ajax({
				url:"vistas/modulos/paciente/work/actionPaciente.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Información borrada");
				}
			});
		}
	});

});
</script>
<script>	
$(document).ready(function() { $('#example2').DataTable(); } );

</script>

