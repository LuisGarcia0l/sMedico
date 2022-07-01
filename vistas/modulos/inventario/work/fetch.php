<?php

//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=fetch_all";

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
			<td>'.$row->nombre.'</td>
			<td>'.$row->presentacion.'</td>
			<td>'.$row->tipo.'</td>
			<td>'.$row->clave.'</td>
            <td>'.$row->fechaentrada.'</td>
            <td>'.$row->fechacaducidad.'</td>
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