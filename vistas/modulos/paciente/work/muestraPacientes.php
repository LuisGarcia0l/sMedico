<?php

//fetch.php

	// petición de paciente
	$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_paciente&id=".$_POST["id"];

	$client = curl_init($api_url);

	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($client);

	$result = json_decode($response);

	$output ="";

	


		$output .= '       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
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

        <tbody>';

	foreach($result as $row)
	{
		$output .= '
		<tr>
		    <td>'.$row->id.'</td>
			<td>'.$row->fecha.'</td>
			<td>'.$row->nombre.'</td>
			<td>'.$row->diagnostico.'</td>
			<td>'.$row->temperatura.'</td>
			<td>'.$row->presion.'</td>
			<td>'.$row->peso.'</td>
			<td>'.$row->estatura.'</td>
			<td>'.$row->observaciones.'</td>
			<td>'.$row->medicamento.'</td>
			<td>'.$row->cantidad_medicamento.'</td>

		</tr>
		';
	}


 $output .= '       </tbody>

       </table>';



		$output .= ' ';	
		

	echo $output;
?>					
						

					   
