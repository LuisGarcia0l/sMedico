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
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="paterno">Apellido paterno</label>
										    <input type="text" class="form-control" id="paterno" value="" readonly>	
										  </div>						  
						</div>
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="materno">Apellido materno</label>
										    <input type="text" class="form-control" id="materno" value="" readonly>
										  </div>	
                        </div>
                        <div class="col-md-4" col-md-offset-4>										  
							<div class="form-group">
										    <label for="nombre">Nombre</label>
										    <input type="text" class="form-control" id="nombre" value="" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>										  
							<div class="form-group">
										    <label for="matricula">Matricula</label>
										    <input type="text" class="form-control" id="matricula" value="" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>		
							<div class="form-group">
										    <label for="discapacidad">Discapacidad</label>
										    <input type="text" class="form-control" id="discapacidad" value="" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="descripcion">Ingeniería</label>
										    <input type="text" class="form-control" id="descripcion" value="" readonly>
										  </div>
						</div>								  							  						  			
						 
					</div> 	

			<!--=====================================
			fin div respuesta
			======================================--> 

						</div>
			<!--=====================================
			inicio de parametros consulta
			======================================--> 

<strong><h5>Diagnostico</h5></strong>
					<div class="row">
						<div class="col-md-10" col-md-offset-2>
				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon"><i class="fa fa-users"> seleccione un diagnostico para continuar</i></span>                  

						<select class="form-control" id="diagnostico" name ="diagnostico" required>
						<option value="0">----Selecciona un diagnostico----</option>

							<?php

							//fetch.php

								$api_url = "http://localhost/medico//vistas/modulos/diagnosticos/api/test_api.php?action=fetch_all";

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
</div>
</div>
</div>

<!--=====================================
	fin div respuesta
======================================--> 

						<div id="preguntas">

					<div class="row">
						<div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="temperatura">Temperatura</label>
										    <input type="text" class="form-control" id="temperatura" name="temperatura" value="" required pattern="[A-Za-z0-9]{20.0,40.0}" placeholder="Solo números 36.0"> 	
										  </div>						  
						</div>
						<div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="presion">Presión</label>
										    <input type="text" class="form-control" id="presion" name="presion" value="" required placeholder="Solo números 110/80">
										  </div>	
                        </div>
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="peso">Peso</label>
										    <input type="text" class="form-control" id="peso" name="peso" value="" required placeholder="Solo números 75">
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="estatura">Estatura</label>
										    <input type="text" class="form-control" id="estatura" name="estatura"  value="" required placeholder="Solo números 1.78">
										  </div>
						</div>
						  							  						  			
						 
					</div> 	

						</div>

<!--=====================================
	fin div preguntas
======================================--> 

						<div id="preguntas2">

					<div class="row">
						<div class="col-md-8" col-md-offset-4>
							<div class="form-group">
										    <label for="observaciones">Observaciones</label>
										    <textarea rows="10" class="form-control" id="observaciones" name ="observaciones" required placeholder="Ingresa cualquier información, diagnostico o sintoma necesarios"></textarea>
										  </div>						  
						</div>						  						  			
						 
					</div> 	

						</div>

<!--=====================================
	fin div preguntas2
======================================--> 

			<!--=====================================
			inicio de parametros consulta
			======================================--> 

<strong><h5>Medicamento</h5></strong>
					<div class="row">
						<div class="col-md-6" >
				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon"><i class="fa fa-users"> seleccione un medicamento para continuar</i></span>                  

						<select class="form-control" id="medicamento" name="medicamento" required>
						<option value="0">----Selecciona un medicamento----</option>

							<?php

							//fetch.php

								$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_medicamentos";

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
										            .' -> unidades disponibles-> '										            		
										            .ucfirst(strtolower($row->contenido))
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
			<!--=====================================
			inicio de parametros consulta
			======================================--> 


					
						<div class="col-md-6" >
<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"> seleccione las unidades</i></span>                  
						<select class="form-control" id="cantidad" name ="cantidad" required>
						<option value="1">1.- unidad</option>
						<option value="2">2.- unidades</option>
						<option value="3">3.- unidades</option>
						<option value="4">4.- unidades</option>
						<option value="5">5.- unidades</option>
						<option value="6">6.- unidades</option>
						<option value="7">7.- unidades</option>
						<option value="8">8.- unidades</option>
						<option value="9">9.- unidades</option>
						<option value="10">10.- unidades</option>
						</select> 

	</div>  
					</div>  
</div>


      <div class="box-header with-border">
  
			<input type="submit" name="add_button" id="add_button" class="btn btn-info" value="Enviar consulta médica" />

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

	$('#add_button').click(function(){

	   	if(validaPaciente())        
       {    	    	
    	alert ("Es necesario que seleccione un paciente");
    	return false;
    	}

	   	if(validaDiagnostico())        
       {    	    	
    	alert ("Es necesario que seleccione un diagnostico");
    	return false;
    	}
    	if(validaObservaciones())        
       {    	    	
    	alert ("Es necesario que escriba alguna observación");
    	}
	   if(validaMedicamento())        
       {    	    	
    	alert ("Es necesario que seleccione un medicamento");
    	return false;
    	}

	});
function CargarPacientes(val)
{
    $('#respuesta').html("<img src='vistas/img/plantilla/cargando.gif' /> Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'vistas/modulos/paciente/work/muestraPaciente.php',
        data: 'id='+val,
        success: function(resp){
            
            $('#respuesta').html(resp);
        }
    });
}

function validaPaciente(){
 var indice = document.fomul.pacientes.value;
 if(indice == "0")
   return true;
 else
   return false;
}
function validaDiagnostico(){
 var indice = document.fomul.diagnostico.value;
 if(indice == "0")
   return true;
 else
   return false;
}
function validaMedicamento(){
 var indice = document.fomul.medicamento.value;
 if(indice == "0")
   return true;
 else
   return false;
}
function validaObservaciones(){
 var indice = document.fomul.observaciones.value.length;
 if(indice == 0)
   return true;
 else
   return false;
}


</script>
