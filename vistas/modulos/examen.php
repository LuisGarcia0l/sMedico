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

<form name="fomul"  action="vistas/modulos/consulta/almacenaexamen.php" method="get"> 
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
						 
					</div>	

			<!--=====================================
			fin div respuesta
			======================================--> 

						</div>
			<!--=====================================
			inicio de parametros consulta
			======================================--> 

 

			<!--=====================================
			inicio de A. Heredofamiliares:
			======================================--> 

<div class="row">
	<div class="col-md-4" >
		<div class="form-group">
			<!-- iCheck -->
			<div class="box box-warning">
				<div class="box-header">
				<h3 class="box-title">A. Heredofamiliares:</h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->
					<div class="form-group">

					<label>
					<input type="checkbox" class="minimal" id="hipertension" name ="hipertension">
					Hipertensión Arterial
					</label>

				    </div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="cardiopatia" name ="cardiopatia">
					Cardiopatías
					</label>

					</div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="diabetes" name ="diabetes">
					Diabetes Mellitus
					</label>

					</div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="nefropatias" name ="nefropatias">
					Nefropatías
					</label>

					</div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="retinopatias" name ="retinopatias">
					Retinopatías
					</label>

					</div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="convulsion" name ="convulsion">
					Crisis convulsivas
					</label>																				

					</div>

				
					<div class="form-group">
					    <label for="cancer">Cancer de:</label>
					    <input type="text" class="form-control" id="cancer" name="cancer" value="" placeholder="Cancer de:">
					</div>
					

					<div class="form-group">
					    <label for="a_otras">Otras especifique:</label>
					    <input type="text" class="form-control" id="a_otras" name="a_otras" value="" placeholder="Otras especifique">
					</div>

					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col (right) -->




			<!--=====================================
			Finaliza de A. Heredofamiliares:
			======================================--> 



			<!--=====================================
			inicio deB. Personales no Patológicos: Toxicomanías: :
			======================================--> 

	<div class="col-md-4">
		<div class="form-group">
			<!-- iCheck -->
			<div class="box box-warning">
				<div class="box-header">
				<h3 class="box-title">B. Personales no Patológicos: Toxicomanías: </h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->
					<div class="form-group">

					<label>
					<input type="checkbox" class="minimal" id="alcoholismo" name ="alcoholismo">
					Alcoholismo
					</label>

				    </div>

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="tabaquismo" name ="tabaquismo">
					Tabaquismo
					</label>

					</div>

					<div class="form-group">
					    <label for="b_otras">Otras especifique:</label>
					    <input type="text" class="form-control" id="b_otras" name="b_otras" value="" placeholder="Otras especifique">
					</div>

					</div>



				<div class="box-header">
				<h3 class="box-title">D. Agudeza Visual:  </h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->

				    <div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="usolentes" name ="usolentes">
					Uso de lentes graduados
					</label>

					</div>

			  <div class="form-group">
                <label>Selecciona solo si usa lentes</label>
                <select class="form-control select2" style="width: 100%;" id="tanos" name="tanos">
                  <option selected="selected" value= "00m">Seleciona el tiempo</option>
                  <option value= "01m">01 mes</option>
                  <option value= "02m">02 meses</option>
                  <option value= "03m">03 meses</option>
                  <option value= "04m">04 meses</option>
                  <option value= "05m">05 meses</option>
                  <option value= "06m">06 meses</option>
                  <option value= "07m">07 meses</option>
                  <option value= "08m">08 meses</option>
                  <option value= "09m">09 meses</option>
                  <option value= "10m">10 meses</option>
                  <option value= "11m">11 meses</option>
                  <option value= "01a">01 año</option>
                  <option value= "02a">02 años</option>
                  <option value= "03a">03 años</option>
                  <option value= "04a">04 años</option>
                  <option value= "05a">05 años</option>
                  <option value= "06a">06 años</option>
                  <option value= "07a">07 años</option>
                  <option value= "08a">08 años</option>
                  <option value= "09a">09 años</option>
                  <option value= "10a">10 años</option>
                  <option value= "11a">11 años</option>
                  <option value= "12a">12 años</option>
                  <option value= "13a">13 años</option>
                  <option value= "14a">14 años</option>
                  <option value= "15a">15 años</option>
                  <option value= "16a">16 años</option>
                  <option value= "17a">17 años</option>
                  <option value= "18a">18 años</option>
                  <option value= "19a">19 años</option>
                  <option value= "20a">20 años</option>
                </select>
              </div>

              		<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="larmazon" name ="larmazon">
					Lentes de armazon
					</label>

					</div>

					<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="lcontacto" name ="lcontacto">
					Lentes de contacto
					</label>
					</div>

					<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="mipia" name ="mipia">
					Miopía
					</label>
					</div>

					<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="hipermetropia" name ="hipermetropia">
					Hipermetropia
					</label>
					</div>

					<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="astigmatismo" name ="astigmatismo">
					Astigmatismo
					</label>
					</div>

					</div>


				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col (right) -->
	



			<!--=====================================
			Finaliza de B. Personales no Patológicos: Toxicomanías: :
			======================================--> 



			<!--=====================================
			inicio deC. Personales Patológicos:
			======================================--> 

	<div class="col-md-4" >
		<div class="form-group">
			<!-- iCheck -->
			<div class="box box-warning">
				<div class="box-header">
				<h3 class="box-title">C. Personales Patológicos: </h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->

					<div class="form-group">
					    <label for="c_otras">Otras especifique:</label>
					    <input type="text" class="form-control" id="c_otras" name="c_otras" value="" placeholder="Otras especifique">
					</div>

					<div class="form-group">
					    <label for="c_auditiva">Agudeza Auditiva:</label>
					    <input type="text" class="form-control" id="c_auditiva" name="c_auditiva" value="" placeholder="Agudeza Auditiva">
					</div>

					<div class="form-group">
					    <label for="c_otras">Antecedentes quirúrgicos:</label>
					    <input type="text" class="form-control" id="aquirurgicos" name="aquirurgicos" value="" placeholder="Antecedentes quirúrgicos:">
					</div>					


					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col (right) -->
	</div>
	<!-- /.row -->




			<!--=====================================
			Finaliza de C. Personales Patológicos:
			======================================--> 

			
			<!--=====================================
			inicio de Examen Físico:
			======================================--> 


	<div class="col-md-12" >
		<div class="form-group">
			<!-- iCheck -->
			<div class="box box-warning">
				<div class="box-header">
				<h3 class="box-title">Examen Físico:</h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="peso">Peso:</label>
					    <input type="text" class="form-control" id="peso" name="peso" value="" placeholder="Especifique Peso">
					
		</div>
	</div>
					
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="talla">Talla:</label>
					    <input type="text" class="form-control" id="talla" name="talla" value="" placeholder="Especifique Talla">
					
		</div>
	</div>		
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="fc">FC:</label> 
					    <input type="text" class="form-control" id="fc" name="fc" value="" placeholder="Especifique FC">
					
		</div>
	</div>

	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="fr">FR:</label>
					    <input type="text" class="form-control" id="fr" name="fr" value="" placeholder="Especifique FR">
					
		</div>
	</div>




	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="ta">T/A:</label>
					    <input type="text" class="form-control" id="ta" name="ta" value="" placeholder="Especifique T/A">
					
		</div>
	</div>
					
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="temperatura">Temperatura:</label>
					    <input type="text" class="form-control" id="temperatura" name="temperatura" value="" placeholder="Especifique Temperatura">
					
		</div>
	</div>		
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="fc">Cráneo:</label> 
					    <input type="text" class="form-control" id="craneo" name="craneo" value="" placeholder="Especifique Cráneo">
					
		</div>
	</div>

	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="fr">Cuello:</label>
					    <input type="text" class="form-control" id="cuello" name="cuello" value="" placeholder="Especifique Cuello">
					
		</div>
	</div>




	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="cardiopulmunar">Cardiopulmonar</label>
					    <input type="text" class="form-control" id="cardiopulmunar" name="cardiopulmunar" value="" placeholder="Especifique Cardiopulmonar">
					
		</div>
	</div>
					
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="abdomen">Abdomen:</label>
					    <input type="text" class="form-control" id="abdomen" name="abdomen" value="" placeholder="Especifique Abdomen">
					
		</div>
	</div>		
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="extremidades">Extremidades:</label> 
					    <input type="text" class="form-control" id="extremidades" name="extremidades" value="" placeholder="Especifique Extremidades">
					
		</div>
	</div>

	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="aauditiva">Agudeza Auditiva:</label>
					    <input type="text" class="form-control" id="aauditiva" name="aauditiva" value="" placeholder="Especifique Agudeza Auditiva">
					
		</div>
	</div>



	<div class="col-md-2" >
		<div class="form-group">
          <label>Grupo sanguineo</label>
                <select class="form-control select2" style="width: 100%;" id="gruposan" name="gruposan">
                  <option selected="selected" value= "A+">A+</option>
                  <option value= "A-">A-</option>
                  <option value= "B+">B+</option>
                  <option value= "B-">B-</option>
                  <option value= "AB+">AB+</option>
                  <option value= "AB-">AB-</option>
                  <option value= "O+">O+</option>
                  <option value= "O-">O-</option>                  
                </select>
					
		</div>
	</div>
					

	<div class="col-md-2" >
		<div class="form-group">
					

					<div class="form-group">
					<label>
					<input type="checkbox" class="minimal" id="nalergia" name ="nalergia">
					Ninguna alergia
					</label>
					</div>
					
		</div>
	</div>

	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="alergiasa">Alergias alimentos :</label>
					    <input type="text" class="form-control" id="alergiasa" name="alergiasa" value="" placeholder="Especifique alergias alimentos">
					
		</div>
	</div>		
	<div class="col-md-3" >
		<div class="form-group">
					
					    <label for="alergiasm">Alergias medicamentos:</label> 
					    <input type="text" class="form-control" id="alergiasm" name="alergiasm" value="" placeholder="Especifique alergias medicamentos">
					
		</div>
	</div>

	<div class="col-md-2" >
		<div class="form-group">
					
					    <label for="alergiasan">Alergias animales:</label>
					    <input type="text" class="form-control" id="alergiasan" name="alergiasan" value="" placeholder="Especifique alergias animales">
					
		</div>
	</div>


					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col (right) -->


			<!--=====================================
			Finaliza de Examen Físico:
			======================================--> 


			<!--=====================================
			inicio de A. Heredofamiliares:
			======================================--> 

<div class="row">
	<div class="col-md-12" >
		<div class="form-group">
			<!-- iCheck -->
			<div class="box box-warning">
				<div class="box-header">
				<h3 class="box-title">Examen Físico</h3>
				</div>
				<div class="box-body">
				<!-- Minimal style -->
					<!-- checkbox -->
					           <!-- textarea -->
		<div class="col-md-3" >
		
                <div class="form-group">
                  <label>Exámenes de laboratorio: </label>
                  <textarea class="form-control" rows="3" placeholder="Exámenes de laboratorio... " id="laboratorio" name="laboratorio"></textarea>
                </div>
       </div>                
	

		<div class="col-md-3" >
		
                <div class="form-group">
                  <label>Observaciones</label>
                  <textarea class="form-control" rows="3" placeholder="Observaciones ..."  id="observaciones" name="observaciones"></textarea>
                </div>
       </div>                

       		<div class="col-md-3" >
		
                <div class="form-group">
                  <label>Encontrándose Clínicamente</label>
                  <textarea class="form-control" rows="3" placeholder="Encontrándose Clínicamente ..."  id="clinicamente" name="clinicamente"></textarea>
                </div>
       </div>                

       		<div class="col-md-3" >
		
                <div class="form-group">
                  <label>Recomendación</label>
                  <textarea class="form-control" rows="3" placeholder="Recomendación ..."  id="recomendacion" name="recomendacion"></textarea>
                </div>
       </div>                		

					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</div>
		<!-- /.col (right) -->




			<!--=====================================
			Finaliza de A. Heredofamiliares:
			======================================--> 



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
        url: 'vistas/modulos/paciente/work/muestraPacienteExamen.php',
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
