<?php

//actionPaciente.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'curp'	=>	$_POST['curp'],
			'matricula'		=>	$_POST['matricula'],
			'id_programa'		=>	$_POST['id_programa'],
			'nombre'		=>	$_POST['nombre'],
			'paterno'		=>	$_POST['paterno'],
			'materno'		=>	$_POST['materno'],
			'tipo_sanguineo'		=>	$_POST['tipo_sanguineo'],
			'discapacidad'		=>	$_POST['discapacidad'],
			'genero'		=>	$_POST["genero"],
			'fecha'		=>	$_POST["fecha"],
			'origen'		=>	$_POST["origen"],
			'estado'		=>	$_POST["estado"],
			'residencia'		=>	$_POST["residencia"]
		);
		$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=insert";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_single&id=".$id."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'curp'	=>	$_POST['curp'],
			'matricula'		=>	$_POST['matricula'],
			'id_programa'		=>	$_POST['id_programa'],
			'nombre'		=>	$_POST['nombre'],
			'paterno'		=>	$_POST['paterno'],
			'materno'		=>	$_POST['materno'],
			'tipo_sanguineo'		=>	$_POST['tipo_sanguineo'],
			'discapacidad'		=>	$_POST['discapacidad'],
			'id'			=>	$_POST['hidden_id'],
			'genero'		=>	$_POST["genero"],
			'fecha'		=>	$_POST["fecha"],
			'origen'		=>	$_POST["origen"],
			'estado'		=>	$_POST["estado"],
			'residencia'		=>	$_POST["residencia"]
		);
		$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=update";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=delete&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>