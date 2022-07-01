<?php

//Api.php
require_once("../../../../modelos/conecta.php");

class API
{
	private $connect = '';


	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = Conexion::conectar();
	}

	function fetch_all()
	{
		$query = "SELECT * FROM medicamentos ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'		=>	$_POST["nombre"],
				':presentacion'		=>	$_POST["presentacion"],
				':tipo'		=>	$_POST["tipo"],
				':clave' =>$_POST["clave"],
				':fechaentrada' =>$_POST["fechaentrada"],
				':fechacaducidad' =>$_POST["fechacaducidad"]
			);
			$query = "
			INSERT INTO medicamentos 
			(nombre, presentacion, tipo,clave,fechaentrada,fechacaducidad) VALUES 
			(:nombre, :presentacion, :tipo,:clave,:fechaentrada,:fechacaducidad)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM medicamentos WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['nombre'] = $row['nombre'];
				$data['presentacion'] = $row['presentacion'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'	=>	$_POST['nombre'],
				':presentacion'	=>	$_POST['presentacion'],
				':tipo'		=>	$_POST["tipo"],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE medicamentos 
			SET nombre = :nombre, presentacion = :presentacion, tipo = :tipo
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function delete($id)
	{
		$query = "DELETE FROM medicamentos WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	/*<----------------------------------------------- API CAJAS ------------------------------------->*/

	function stock($id){
		$query = "SELECT * FROM cajas WHERE medicamento_id = ".$id." ORDER BY id_caja ";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insertCaja()
	{
		if(isset($_POST["contenido"]))
		{
			$form_data = array(
				':id_caja'		=>	$_POST["id_caja"],				
				':caducidad'		=>	$_POST["caducidad"],
				':contenido'		=>	$_POST["contenido"],
				':medicamento_id'		=>	$_POST["medicamento_id"]
			);
			$query = "
			INSERT INTO cajas 
			(id_caja,caducidad,contenido,medicamento_id) VALUES 
			(:id_caja,:caducidad,:contenido,:medicamento_id)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function deleteCaja($id)
	{
		$query = "DELETE FROM cajas WHERE id_caja = ".$id."";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>