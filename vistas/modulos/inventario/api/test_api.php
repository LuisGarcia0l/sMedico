<?php

//Retornan JSON
//test_api.php
//http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=fetch_single&id=5
//http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=delete&id=6
//http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=fetch_all
//http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=stock

include('Api.php');

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	$data = $api_object->fetch_all();
}

if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}

if($_GET["action"] == 'fetch_single')
{
	$data = $api_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'update')
{
	$data = $api_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $api_object->delete($_GET["id"]);
}

if($_GET["action"] == 'stock')
{
	$data = $api_object->stock($_GET["id"]);
}

if($_GET["action"] == 'insertCaja')
{
	$data = $api_object->insertCaja();
}

if($_GET["action"] == 'deleteCaja')
{
	$data = $api_object->deleteCaja($_GET["id"]);
}
echo json_encode($data);

?>