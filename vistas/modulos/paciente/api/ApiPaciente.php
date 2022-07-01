<?php

//ApiPaciente.php

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
		$query = "SELECT p.*,pe.descripcion FROM paciente p,programa_educativo pe WHERE p.id_programa=pe.id ORDER BY id";
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
	function fetch_all_consulta($id)
	{
	
$query = "select * from consultas where id_paciente=".$id." ORDER BY id_paciente";
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
			


function fetch_medicamentos()
	{
		$query = " select m.id,nombre,presentacion,tipo,sum(contenido) contenido from medicamentos m,cajas c
					where m.id = c.medicamento_id
					   and contenido>0
					   group by m.id,nombre,presentacion,tipo";
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
		if(isset($_POST["curp"]))
		{
			$form_data = array(
				':curp'		=>	$_POST["curp"],
				':matricula'		=>	$_POST["matricula"],
				':id_programa'		=>	$_POST["id_programa"],
				':nombre'		=>	$_POST["nombre"],
				':paterno'		=>	$_POST["paterno"],
				':materno'		=>	$_POST["materno"],
				':tipo_sanguineo'		=>	$_POST["tipo_sanguineo"],
				':discapacidad'		=>	$_POST["discapacidad"],
				':genero'		=>	$_POST["genero"],
				':fecha'		=>	$_POST["fecha"],
				':origen'		=>	$_POST["origen"],
				':estado'		=>	$_POST["estado"],
				':residencia'		=>	$_POST["residencia"]
			);
			$query = "
			INSERT INTO paciente 
			(curp, 
			 matricula, 
			 id_programa, 
			 nombre, 
			 paterno, 
			 materno, 
			 tipo_sanguineo, 
			 discapacidad,
			 genero, fecha_nacimiento, lugar_origen, estado, residencia) VALUES 
			(:curp, 
			 :matricula, 
			 :id_programa, 
			 :nombre, 
			 :paterno, 
			 :materno, 
			 :tipo_sanguineo, 
			 :discapacidad,
			 :genero,
			 :fecha,
			 :origen,
			 :estado,
			 :residencia)";
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
		$query = "SELECT p.*,pe.descripcion, year(curdate())-year(p.fecha_nacimiento) edad  FROM paciente p,programa_educativo pe WHERE p.id_programa=pe.id and p.id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id'] = $row['id'];
				$data['curp'] = $row['curp'];
				$data['matricula'] = $row['matricula'];
				$data['id_programa'] = $row['id_programa'];
				$data['descripcion'] = $row['descripcion'];
				$data['nombre'] = $row['nombre'];
				$data['paterno'] = $row['paterno'];
				$data['materno'] = $row['materno'];
				$data['tipo_sanguineo'] = $row['tipo_sanguineo'];
				$data['discapacidad'] = $row['discapacidad'];
				$data['genero'] = $row['genero'];
				$data['fecha'] = $row['fecha_nacimiento'];
				$data['lugar_origen'] = $row['lugar_origen'];
				$data['estado'] = $row['estado'];
				$data['residencia'] = $row['residencia'];
				$data['edad'] = $row['edad'];
			}
			return $data;
		}
	}

	function fetch_single_examen($id)
	{
		$query = "SELECT ex.id,
       ex.fecha_examen,
       ex.id_paciente,
       ex.hipertension_Arterial,
       ex.cardiopatias,
       ex.diabetes_Mellitus,
       ex.nefropatias,
       ex.retinopatias,
       ex.cancer_de,
       ex.crisis_convulsivas,
       ex.heredofamiliares_otras,
       ex.alcoholismo,
       ex.tabaquismo,
       ex.personales_patologicos_otros,
       ex.usa_lentes_graduados,
       ex.usa_lentes_tiempo,
       ex.usa_lentes_anos,
       ex.usa_lentes_meses,
       ex.usa_lentes_armazon,
       ex.usa_lentes_contacto,
       ex.miopia,
       ex.hipermetropia,
       ex.astigmatismo,
       ex.agudeza_auditiva,
       ex.antecedentes_quirurgicos,
       ex.peso,
       ex.talla,
       ex.fc,
       ex.fr,
       ex.ta,
       ex.temp,
       ex.craneo,
       ex.cuello,
       ex.cardiopulmonar,
       ex.abdomen,
       ex.extremidades,
       ex.a_auditiva,
       ex.grupo_sanguineo,
       ex.alergias,
       ex.alergias_alimento,
       ex.alergias_medicamento,
       ex.alergias_animales,
       ex.alergias_alimento_cual,
       ex.alergias_medicamento_cual,
       ex.alergias_animales_cual,
       ex.examenes_laboratorio,
       ex.observaciones,
       ex.estado_clinico,
       ex.recomendaciones,
       ex.folio,      
       p.curp, 
       p.matricula, 
       pe.descripcion programa_educativo, 
       p.nombre, 
       p.paterno, 
       p.materno, 
       p.tipo_sanguineo, 
       p.discapacidad, 
       p.genero, 
       year(curdate())-year(p.fecha_nacimiento) edad, 
       p.lugar_origen, 
       p.estado, 
       p.residencia
       from examen_medico ex,paciente p, programa_educativo pe
     where ex.id_paciente=".$id."
       and ex.id_paciente=p.id
       and p.id_programa=pe.id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
					$data['id']=$row['id'];
					$data['fecha_examen']=$row['fecha_examen'];
					$data['id_paciente']=$row['id_paciente'];
					$data['hipertension_Arterial']=$row['hipertension_Arterial'];
					$data['cardiopatias']=$row['cardiopatias'];
					$data['diabetes_Mellitus']=$row['diabetes_Mellitus'];
					$data['nefropatias']=$row['nefropatias'];
					$data['retinopatias']=$row['retinopatias'];
					$data['cancer_de']=$row['cancer_de'];
					$data['crisis_convulsivas']=$row['crisis_convulsivas'];
					$data['heredofamiliares_otras']=$row['heredofamiliares_otras'];
					$data['alcoholismo']=$row['alcoholismo'];
					$data['tabaquismo']=$row['tabaquismo'];
					$data['personales_patologicos_otros']=$row['personales_patologicos_otros'];
					$data['usa_lentes_graduados']=$row['usa_lentes_graduados'];
					$data['usa_lentes_tiempo']=$row['usa_lentes_tiempo'];
					$data['usa_lentes_anos']=$row['usa_lentes_anos'];
					$data['usa_lentes_meses']=$row['usa_lentes_meses'];
					$data['usa_lentes_armazon']=$row['usa_lentes_armazon'];
					$data['usa_lentes_contacto']=$row['usa_lentes_contacto'];
					$data['miopia']=$row['miopia'];
					$data['hipermetropia']=$row['hipermetropia'];
					$data['astigmatismo']=$row['astigmatismo'];
					$data['agudeza_auditiva']=$row['agudeza_auditiva'];
					$data['antecedentes_quirurgicos']=$row['antecedentes_quirurgicos'];
					$data['peso']=$row['peso'];
					$data['talla']=$row['talla'];
					$data['fc']=$row['fc'];
					$data['fr']=$row['fr'];
					$data['ta']=$row['ta'];
					$data['temp']=$row['temp'];
					$data['craneo']=$row['craneo'];
					$data['cuello']=$row['cuello'];
					$data['cardiopulmonar']=$row['cardiopulmonar'];
					$data['abdomen']=$row['abdomen'];
					$data['extremidades']=$row['extremidades'];
					$data['a_auditiva']=$row['a_auditiva'];
					$data['grupo_sanguineo']=$row['grupo_sanguineo'];
					$data['alergias']=$row['alergias'];
					$data['alergias_alimento']=$row['alergias_alimento'];
					$data['alergias_medicamento']=$row['alergias_medicamento'];
					$data['alergias_animales']=$row['alergias_animales'];
					$data['alergias_alimento_cual']=$row['alergias_alimento_cual'];
					$data['alergias_medicamento_cual']=$row['alergias_medicamento_cual'];
					$data['alergias_animales_cual']=$row['alergias_animales_cual'];
					$data['examenes_laboratorio']=$row['examenes_laboratorio'];
					$data['observaciones']=$row['observaciones'];
					$data['estado_clinico']=$row['estado_clinico'];
					$data['recomendaciones']=$row['recomendaciones'];
					$data['folio']=$row['folio'];
					$data['curp']=$row['curp'];
					$data['matricula']=$row['matricula'];
					$data['programa_educativo']=$row['programa_educativo'];
					$data['nombre']=$row['nombre'];
					$data['paterno']=$row['paterno'];
					$data['materno']=$row['materno'];
					$data['tipo_sanguineo']=$row['tipo_sanguineo'];
					$data['discapacidad']=$row['discapacidad'];
					$data['genero']=$row['genero'];
					$data['edad']=$row['edad'];
					$data['lugar_origen']=$row['lugar_origen'];
					$data['estado']=$row['estado'];
					$data['residencia']=$row['residencia'];

			}
			return $data;
		}
	}


	function fetch_paciente($id)
	{
		$query = " SELECT c.id,
       				c.fecha,
       				lower(concat(p.paterno,' ',p.materno,' ',p.nombre)) nombre,
       				d.descripcion diagnostico,
       				lower(concat(c.temperatura,' Cº')) temperatura,
       				c.presion,
       				lower(concat(c.peso,' Kg')) peso,
       				concat(c.estatura,' m') estatura,
       				c.observaciones,
       				m.nombre medicamento,
       				lower(concat(c.cantidad_medicamento,' unidades')) cantidad_medicamento
			FROM consultas  c, 
     			 paciente p,
     			 medicamentos m,
     			 diagnosticos d
			where c.id_paciente=".$id."
  					and c.id_paciente=p.id
  					and c.id_medicamento =m.id
  					and c.id_diagnostico=d.id
  					order by c.fecha desc,c.id asc";

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



	function update()
	{
		if(isset($_POST["curp"]))
		{
			$form_data = array(
				':curp'	=>	$_POST['curp'],
				':matricula'	=>	$_POST['matricula'],
				':id_programa'	=>	$_POST['id_programa'],
				':nombre'	=>	$_POST['nombre'],
				':paterno'	=>	$_POST['paterno'],
				':materno'	=>	$_POST['materno'],
				':tipo_sanguineo'	=>	$_POST['tipo_sanguineo'],
				':discapacidad'	=>	$_POST['discapacidad'],				
				':genero'		=>	$_POST["genero"],
				':fecha'		=>	$_POST["fecha"],
				':origen'		=>	$_POST["origen"],
				':estado'		=>	$_POST["estado"],
				':residencia'		=>	$_POST["residencia"],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE paciente 
			SET curp = :curp, matricula = :matricula, id_programa = :id_programa, nombre = :nombre, paterno = :paterno, materno = :materno, tipo_sanguineo = :tipo_sanguineo, discapacidad = :discapacidad,
			genero = :genero,
			fecha_nacimiento = :fecha,
			lugar_origen = :origen,
			estado = :estado,
			residencia = :residencia
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
		$query = "DELETE FROM paciente WHERE id = '".$id."'";
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