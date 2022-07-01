<?php

//test_apiPaciente.php
//http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_single&id=5
//http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=delete&id=6
//http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_all
//http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_paciente&id=1
//http://localhost/medico//vistas/modulos/paciente/api/test_apiPaciente.php?action=fetch_single_examen&id=1

include('ApiPaciente.php');

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	$data = $api_object->fetch_all();
}

if($_GET["action"] == 'fetch_medicamentos')
{
	$data = $api_object->fetch_medicamentos();
}


if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}

if($_GET["action"] == 'fetch_single')
{
	$data = $api_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'fetch_single_examen')
{
	$data = $api_object->fetch_single_examen($_GET["id"]);
}

if($_GET["action"] == 'fetch_paciente')
{
	$data = $api_object->fetch_paciente($_GET["id"]);
}

if($_GET["action"] == 'update')
{
	$data = $api_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $api_object->delete($_GET["id"]);
}

echo json_encode($data);

?>