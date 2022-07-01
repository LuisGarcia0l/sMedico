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
		$query = "SELECT * FROM programa_educativo ORDER BY id";
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
		if(isset($_POST["descripcion"]))
		{
			$form_data = array(
				':descripcion'		=>	$_POST["descripcion"]
			);
			$query = "
			INSERT INTO programa_educativo 
			(descripcion) VALUES 
			(:descripcion)
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
		$query = "SELECT * FROM programa_educativo WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id'] = $row['id'];
				$data['descripcion'] = $row['descripcion'];
				$data['creado'] = $row['creado'];
				$data['actualizado'] = $row['actualizado'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["descripcion"]))
		{
			$form_data = array(
				':descripcion'	=>	$_POST['descripcion'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE programa_educativo 
			SET descripcion = :descripcion, actualizado = now() 
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
		$query = "DELETE FROM programa_educativo WHERE id = '".$id."'";
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