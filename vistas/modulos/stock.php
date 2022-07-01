<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<form name="prueba" method="POST">
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar cajas medicamento
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cajas medicamento</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" type="button" name="add_button" id="add_button">
          
          Agregar cajas medicamento

        </button>

      </div>


			<!--=====================================
			ENTRADA DEL CLIENTE
			======================================--> 


					<div class="row">
						<div class="col-md-10" col-md-offset-2>
				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon"><i class="fa fa-users"> seleccione un medicamento para continuar</i></span>                  

						<select class="form-control" id="qmedicamento_id" name="qmedicamento_id" onchange="CargarPacientes(this.value);" required>
						<option value="0">-Selecciona un medicamento-</option>

							<?php

							//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=fetch_all";

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
										            .ucfirst(strtolower($row->nombre))
										            .' -> '
										            .ucfirst(strtolower($row->presentacion))
										            .' -> '
										            .ucfirst(strtolower($row->tipo))
										            .' '
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
</div>
</div>
</div>


	<div id="respuesta">

      <div class="box-body">
        
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>           
           <th style="width:10px">#</th>
			<th>caducidad</th>
			<th>contenido</th>
         </tr> 

        </thead>

        <tbody>


        </tbody>

       </table>

    </div>
      </div>

    </div>

  </section>

</div>

</form>

<!--Sistema para anuncios tipo alerta-->

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<h4 class="modal-title">Agregar cajas medicamento</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
<select class="form-control" id="medicamento_id" name="medicamento_id" required>
						<option value="0">-Selecciona un medicamento-</option>

							<?php

							//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=fetch_all";

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
										            .ucfirst(strtolower($row->nombre))
										            .' -> '
										            .ucfirst(strtolower($row->presentacion))
										            .' -> '
										            .ucfirst(strtolower($row->tipo))
										            .' '
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
			        	<label>Ingresa el número de caja del medicamento</label>
			        	<input type="text" name="id_caja" id="id_caja" class="form-control" placeholder="Número de caja o código de barras"/>
			        </div>
			        <div class="form-group">
			        	<label>Ingresa su fecha de caducidad</label>
			        	<input type="text" name="caducidad" id="caducidad" class="form-control" placeholder="Ingresa la caducidad  en el siguiente formato YYYY-MM-DD"/>
			        </div>
					<div class="form-group">
			        	<label>Ingresa el total de piezas o unidades</label>
			        	<input type="text" name="contenido" id="contenido" class="form-control" placeholder="Ingresa el total de piezas o unidades"/>
			        </div>
			    </div>
			    <div class="modal-footer">
			    	
			    	<input type="hidden" name="action" id="action" value="insert" /> <!--Valor para accion a Realizar-->
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insertar" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>





<!--Acciones para los botones-->

<script type="text/javascript">


	$('#add_button').click(function(){		
		//document.getElementById("hmedicamento_id").value=document.getElementById("medicamento_id").value;
		//alert (document.getElementById("hmedicamento_id").value);
		$('#action').val('insertCaja'); //Linea Repetitiva?
		$('#button_action').val('Insertar caja'); //Linea Repetitiva?medicamento_id		
		$('.modal-title').text('Agregar cajas de medicamento');
		$('#apicrudModal').modal('show');
	});



	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();

			var form_data = $(this).serialize();
			$.ajax({
				url:"vistas/modulos/inventario/work/action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					
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
		
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'deleteCaja';
		if(confirm("¿Estas seguro de borrar este registró?"))
		{
			$.ajax({
				url:"vistas/modulos/inventario/work/action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					
					alert("Información borrada");
				}
			});
		}
	});



	function CargarPacientes(val)
{
    $('#respuesta').html("<img src='vistas/img/plantilla/cargando.gif' /> Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'http://localhost/medico/vistas/modulos/inventario/work/fetchstock.php',
        data: 'id='+val,
        success: function(resp){
            
            $('#respuesta').html(resp);
        }
    });
}


</script>
