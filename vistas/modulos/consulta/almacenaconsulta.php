<?php

//ApiPaciente.php

require_once("../../../modelos/conecta.php");


$connect = Conexion::conectar();




//echo $_GET["pacientes"]." paciente</br>";
//echo $_GET["diagnostico"]." diagnostico</br>";
//echo $_GET["temperatura"]." temperatura</br>";
//echo $_GET["presion"]." presion</br>";
//echo $_GET["peso"]." peso</br>";
//echo $_GET["observaciones"]." observaciones</br>";
//echo $_GET["estatura"]." estatura</br>";
//echo $_GET["medicamento"]." medicamento</br>";
//echo $_GET["cantidad"]." cantidad</br>";


			$form_data = array(
				':id'		=>	null,				
				':pacientes'		=>	$_GET["pacientes"],
				':diagnostico'		=>	$_GET["diagnostico"],
				':temperatura'		=>	$_GET["temperatura"],
				':presion'		=>	$_GET["presion"],
				':peso'		=>	$_GET["peso"],				
				':estatura'		=>	$_GET["estatura"],
				':observaciones'		=>	$_GET["observaciones"],
				':medicamento'		=>	$_GET["medicamento"],
				':cantidad'		=>	$_GET["cantidad"]
			);
$query = "	INSERT INTO consultas 
		(id,
		fecha,
		id_paciente, 
		id_diagnostico, 
		temperatura, 
		presion, 
		peso, 
		estatura, 
		observaciones, 
		id_medicamento,
		cantidad_medicamento) VALUES 
		(:id,
		 now(),
		 :pacientes, 
		 :diagnostico, 
		 :temperatura, 
		 :presion, 
		 :peso, 
		 :estatura, 
		 :observaciones, 
		 :medicamento, 
		 :cantidad)";
			$statement = $connect ->prepare($query);
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
		





$url = $_SERVER['HTTP_REFERER'];
header("LOCATION:$url");
echo '<script type="text/javascript">alert("lo que quieras");</script>'; 

	
?>