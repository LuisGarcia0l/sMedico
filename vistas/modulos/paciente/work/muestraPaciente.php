<?php

//fetch.php

	// petición de paciente
	$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_single&id=".$_POST["id"];

	$client = curl_init($api_url);

	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($client);

	$result = json_decode($response);

	$output ="";

	if($result->id > 0){	


					$output .= '<div class="row">
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="paterno">Apellido paterno</label>
										    <input type="text" class="form-control" id="paterno" value="'.ucfirst(strtolower($result->paterno)).'" readonly>	
										  </div>						  
						</div>
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="materno">Apellido materno</label>
										    <input type="text" class="form-control" id="materno" value="'.ucfirst(strtolower($result->materno)).'" readonly>
										  </div>	
                        </div>
                        <div class="col-md-4" col-md-offset-4>										  
							<div class="form-group">
										    <label for="nombre">Nombre</label>
										    <input type="text" class="form-control" id="nombre" value="'.ucfirst(strtolower($result->nombre)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="matricula">Matricula</label>
										    <input type="text" class="form-control" id="matricula" value="'.ucfirst(strtolower($result->matricula)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="discapacidad">Discapacidad</label>
										    <input type="text" class="form-control" id="discapacidad" value="'.ucfirst(strtolower($result->discapacidad)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="sangre">Tipo sanguineo</label>
										    <input type="text" class="form-control" id="sangre" value="'.ucfirst(strtolower($result->tipo_sanguineo)).'" readonly>
										  </div>
						</div>';


				// petición de ingenieria
				$id=$result->id_programa;
				$api_url = "http://localhost/medico//vistas/modulos/programaeducativo/api/test_api.php?action=fetch_single&id=".$id;

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				$result = json_decode($response);


				$output .= ' <div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="descripcion">Ingeniería</label>
										    <input type="text" class="form-control" id="descripcion" value="'.ucfirst(strtolower($result->descripcion)).'" readonly>
										  </div>
						</div>								  							  						  			
						 
					</div> ';							  				  
		
	}
		else{
			$output .= '<div class="row">
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="paterno">Apellido paterno</label>
										    <input type="text" class="form-control" id="paterno" value="No se encontro información" readonly>	
										  </div>						  
						</div>
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="materno">Apellido materno</label>
										    <input type="text" class="form-control" id="materno" value="No se encontro información" readonly>
										  </div>	
                        </div>
                        <div class="col-md-4" col-md-offset-4>										  
							<div class="form-group">
										    <label for="nombre">Nombre</label>
										    <input type="text" class="form-control" id="nombre" value="No se encontro información" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>										  
							<div class="form-group">
										    <label for="matricula">Matricula</label>
										    <input type="text" class="form-control" id="matricula" value="No se encontro información" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>		
							<div class="form-group">
										    <label for="discapacidad">Discapacidad</label>
										    <input type="text" class="form-control" id="discapacidad" value="No se encontro información" readonly>
										  </div>
						</div>
						<div class="col-md-4" col-md-offset-4>
							<div class="form-group">
										    <label for="descripcion">Ingeniería</label>
										    <input type="text" class="form-control" id="descripcion" value="No se encontro información" readonly>
										  </div>
						</div>								  							  						  			
						 
					</div> ';	
		}

	echo $output;
?>					
						

					   
