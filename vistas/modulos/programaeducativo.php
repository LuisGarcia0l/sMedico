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
      
      Administrar programa educativo
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar programa educativo</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" type="button" name="add_button" id="add_button">
          
          Agregar programa educativo

        </button>

      </div>

      <div class="box-body">
        
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
								<th>Nombre</th>
								<th>creado</th>
								<th>actualizado</th>
								<th>Editar</th>
								<th>Borrar</th>

         </tr> 

        </thead>

        <tbody>


<?php

//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/ProgramaEducativo/api/test_api.php?action=fetch_all";

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
			<td>'.$row->descripcion.'</td>
			<td>'.$row->creado.'</td>
			<td>'.$row->actualizado.'</td>
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
		<td colspan="4" align="center">No se encontro información</td>
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
			        	<label>Ingresa el nombre</label>
			        	<input type="text" name="descripcion" id="descripcion" class="form-control" />
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
			url:"vistas/modulos/programaeducativo/work/fetch.php",
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
		if($('#descripcion').val() == '')
		{
			alert("Ingresa tu descripción");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"vistas/modulos/programaeducativo/work/action.php",
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
			url:"vistas/modulos/programaeducativo/work/action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#descripcion').val(data.descripcion);
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
				url:"vistas/modulos/programaeducativo/work/action.php",
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






