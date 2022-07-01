<?php

//fetchPaciente.php

$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_all";

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
		<td colspan="4" align="center">No se encontro información</td>
	</tr>
	';
}

echo $output;

echo "<script>	
$(document).ready(function() { $('#example2').DataTable(); } );

</script>";

?>