<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return; }

?>

<div class="content-wrapper">

	<section class="content-header">

		<h1>

		Consulta nueva

		</h1>

		<ol class="breadcrumb">

		<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

		<li class="active">consulta nueva</li>

		</ol>

	</section>

<form name="fomul"  action="vistas/modulos/consulta/almacenaconsulta.php" method="get"> 
	<section class="content">

		<div class="box">

			<div class="box-body col-6">

			<!--=====================================
			ENTRADA DEL CLIENTE
			======================================--> 


					<div class="row">
						<div class="col-md-10" col-md-offset-2>
				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon"><i class="fa fa-users"> seleccione un paciente para continuar</i></span>                  

						<select class="form-control" id="pacientes" name="pacientes" onchange="CargarPacientes(this.value);" required>
						<option value="0">-Selecciona un paciente-</option>

							<?php

							//fetch.php

								$api_url = "http://localhost/medico/vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_all";

								$client = curl_init($api_url);

								curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

								$response = curl_exec($client);

								$result = json_decode($response);

								$output = '';

								if(count($result) > 0){
									foreach($result as $row){
										$output .= '<option value="' .$row->id. '">' 
										            .$row->matricula
										            .'.- '
										            .ucfirst(strtolower($row->paterno))
										            .' '
										            .ucfirst(strtolower($row->materno))
										            .' '
										            .ucfirst(strtolower($row->nombre))
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

					<div class="row">
							  							  						  			
						 
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
								<th>Fecha</th>
								<th>Nombre paciente</th>
								<th>Diagnóstico</th>
								<th>Temperatura</th>
								<th>Presión</th>
								<th>Peso</th>
								<th>Estatura</th>
								<th>Observaciones</th>
								<th>Medicamento</th>
								<th>Cantidad medicamento</th>

         </tr> 

        </thead>

        <tbody>


        </tbody>

       </table>



					</div> 	

			<!--=====================================
			fin div respuesta
			======================================--> 

						</div>



<!--=====================================
	fin div respuesta
======================================--> 

			            </div>

					</div>

			</div>
		</div>
	</section>
	</form>
</div>


<script>

function CargarPacientes(val)
{
    $('#respuesta').html("<img src='vistas/img/plantilla/cargando.gif' /> Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'vistas/modulos/paciente/work/muestraPacientes.php',
        data: 'id='+val,
        success: function(resp){
            
            $('#respuesta').html(resp);
        }
    });
}


</script>
</script>
<script>	
$(document).ready(function() { $('#example2').DataTable(); } );
</script>