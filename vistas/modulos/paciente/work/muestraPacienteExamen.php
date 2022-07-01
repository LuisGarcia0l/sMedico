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
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="nombre">Nombre</label>
										    <input type="text" class="form-control"  name ="nombre" id="nombre" value="'.ucfirst(strtolower($result->paterno)).' '.ucfirst(strtolower($result->materno)).' '.ucfirst(strtolower($result->nombre)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="matricula">Matricula</label>
										    <input type="text" class="form-control" name ="matricula" id="matricula" value="'.ucfirst(strtolower($result->matricula)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="discapacidad">Discapacidad</label>
										    <input type="text" class="form-control" name ="discapacidad" id="discapacidad" value="'.ucfirst(strtolower($result->discapacidad)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="sangre">Tipo sanguineo</label>
										    <input type="text" class="form-control" name ="sangre" id="sangre" value="'.ucfirst(strtolower($result->tipo_sanguineo)).'" readonly>
										  </div>
						</div>';


if (ucfirst(strtolower($result->genero)) =='M'){
						$output .= '					
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="genero">Género</label>
										    <input type="text" class="form-control" name ="genero" id="genero" value="Masculino" readonly>
										  </div>
						</div>';
}
else{
							$output .= '					
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="genero">Género</label>
										    <input type="text" class="form-control" name ="genero" id="genero" value="Femenino" readonly>
										  </div>
						</div>';
}





					$output .= '	
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="edad">Edad</label>
										    <input type="text" class="form-control" name ="edad" id="edad" value="'.ucfirst(strtolower($result->edad)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="origen">Lugar origen</label>
										    <input type="text" class="form-control" name ="origen" id="origen" value="'.ucfirst(strtolower($result->lugar_origen)).'" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="residencia">Residencia</label>
										    <input type="text" class="form-control" name ="residencia" id="residencia" value="'.ucfirst(strtolower($result->residencia)).'" readonly>
										  </div>
						</div>
						 <div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="estado">Estado</label>
										    <input type="text" class="form-control" name ="estado" id="estado" value="'.ucfirst(strtolower($result->estado)).'" readonly>
										  </div>
						</div>	
												';




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
										    <input type="text" class="form-control" name ="descripcion" id="descripcion" value="'.ucfirst(strtolower($result->descripcion)).'" readonly>
										  </div>
						</div>								  							  						  			
						 
					</div> ';							  				  
		
	}
		else{
								$output .= '<div class="row">						
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="nombre">Nombre</label>
										    <input type="text" class="form-control" id="nombre" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="matricula">Matricula</label>
										    <input type="text" class="form-control" id="matricula" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="discapacidad">Discapacidad</label>
										    <input type="text" class="form-control" id="discapacidad" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="sangre">Tipo sanguineo</label>
										    <input type="text" class="form-control" id="sangre" value="" readonly>
										  </div>
						</div>					
                        <div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="genero">Género</label>
										    <input type="text" class="form-control" id="genero" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>										  
							<div class="form-group">
										    <label for="edad">Edad</label>
										    <input type="text" class="form-control" id="edad" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="origen">Lugar origen</label>
										    <input type="text" class="form-control" id="origen" value="" readonly>
										  </div>
						</div>
						<div class="col-md-3" col-md-offset-3>		
							<div class="form-group">
										    <label for="residencia">Residencia</label>
										    <input type="text" class="form-control" id="residencia" value="" readonly>
										  </div>
						</div>
						 <div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="estado">Estado</label>
										    <input type="text" class="form-control" id="estado" value="" readonly>
										  </div>
						</div>	
						 <div class="col-md-3" col-md-offset-3>
							<div class="form-group">
										    <label for="descripcion">Ingeniería</label>
										    <input type="text" class="form-control" id="descripcion" value="" readonly>
										  </div>
						</div>								  							  						  			
						 
					</div> ';	
		}

	echo $output;
?>					
						

					   
