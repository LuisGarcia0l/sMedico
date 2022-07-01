<?php
require_once('tcpdf/tcpdf.php');
//ApiPaciente.php

require_once("../../../modelos/conecta.php");




$connect = Conexion::conectar();

 $sql = 'call dame_folio()';
 $stmt = $connect->prepare($sql);
 $stmt->execute();
  
 $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query
     
 // este codigo es para recuperar un valor
 $r = $connect->query('select @v_folio'); 
 $total = $r->fetchColumn();
 
$stmt = $connect->query("SELECT * FROM folio");
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($clientes as $cliente){
    $folio= $cliente->folio;
    $fol= $cliente->id;
}

//echo $folio."->folio</br>";
//echo $fol."->fol</br>";

//echo $_GET["pacientes"]."->pacientes</br>";
//-----------------------------------------------

//echo $_GET["nombre"]."->nombre</br>";

//echo $_GET["matricula"]."->matricula</br>";

//echo $_GET["discapacidad"]."->discapacidad</br>";

//echo $_GET["genero"]."->genero</br>";

//echo $_GET["edad"]."->edad</br>";

//echo $_GET["origen"]."->origen</br>";

//echo $_GET["residencia"]."->residencia</br>";

//echo $_GET["estado"]."->estado</br>";

//echo $_GET["descripcion"]."->descripcion</br>";

//-----------------------------------------------

if(isset($_GET["hipertension"])){$hipertension=1;}else{$hipertension=0;}
//echo $hipertension."->hipertension</br>";

if(isset($_GET["cardiopatia"])){$cardiopatia=1;}else{$cardiopatia=0;}
//echo $cardiopatia."->cardiopatia</br>";

if(isset($_GET["diabetes"])){$diabetes=1;}else{$diabetes=0;}
//echo $diabetes."->diabetes</br>";

if(isset($_GET["nefropatias"])){$nefropatias=1;}else{$nefropatias=0;}
//echo $nefropatias."->nefropatias</br>";

if(isset($_GET["retinopatias"])){$retinopatias=1;}else{$retinopatias=0;}
//echo $retinopatias."->retinopatias</br>";

if(isset($_GET["convulsion"])){$convulsion=1;}else{$convulsion=0;}
//echo $convulsion."->convulsion</br>";

//echo $_GET["cancer"]."->cancer</br>";

//echo $_GET["a_otras"]."->a_otras</br>";

//-----------------------------------------------

if(isset($_GET["alcoholismo"])){$alcoholismo=1;}else{$alcoholismo=0;}
//echo $alcoholismo."->alcoholismo</br>";

if(isset($_GET["tabaquismo"])){$tabaquismo=1;}else{$tabaquismo=0;}
//echo $tabaquismo."->tabaquismo</br>";

//echo $_GET["b_otras"]."->b_otras</br>";

if(isset($_GET["usolentes"])){$usolentes=1;}else{$usolentes=0;}
//echo $usolentes."->usolentes</br>";

$tiempo=substr($_GET["tanos"], 0, 2);
//echo $tiempo."->tanos</br>";

$tiempod=substr($_GET["tanos"], 2, 1);
//echo $tiempod."->tiempod</br>";

if(isset($_GET["larmazon"])){$larmazon=1;}else{$larmazon=0;}
//echo $larmazon."->larmazon</br>";

if(isset($_GET["lcontacto"])){$lcontacto=1;}else{$lcontacto=0;}
//echo $lcontacto."->lcontacto</br>";

if(isset($_GET["mipia"])){$mipia=1;}else{$mipia=0;}
//echo $mipia."->mipia</br>";

if(isset($_GET["hipermetropia"])){$hipermetropia=1;}else{$hipermetropia=0;}
//echo $hipermetropia."->hipermetropia</br>";

if(isset($_GET["astigmatismo"])){$astigmatismo=1;}else{$astigmatismo=0;}
//echo $astigmatismo."->astigmatismo</br>";

//-----------------------------------------------

//echo $_GET["c_otras"]."->c_otras</br>";

//echo $_GET["c_auditiva"]."->c_auditiva</br>";

//echo $_GET["aquirurgicos"]."->aquirurgicos</br>";

//-----------------------------------------------

//echo $_GET["peso"]."->peso</br>";

//echo $_GET["talla"]."->talla</br>";

//echo $_GET["fc"]."->fc</br>";

//echo $_GET["fr"]."->fr</br>";

//echo $_GET["ta"]."->ta</br>";

//echo $_GET["temperatura"]."->temperatura</br>";

//echo $_GET["craneo"]."->craneo</br>";

//echo $_GET["cuello"]."->cuello</br>";

//echo $_GET["cardiopulmunar"]."->cardiopulmunar</br>";

////echo $_GET["abdomen"]."->abdomen</br>";

////echo $_GET["extremidades"]."->extremidades</br>";

////echo $_GET["aauditiva"]."->aauditiva</br>";

////echo $_GET["gruposan"]."->gruposan</br>";

if(isset($_GET["nalergia"])){$nalergia=1;}else{$nalergia=0;}
/////echo $nalergia."->nalergia</br>";

////echo $_GET["alergiasa"]."->alergiasa</br>";

////echo $_GET["alergiasm"]."->alergiasm</br>";

////echo $_GET["alergiasan"]."->alergiasan</br>";

//-----------------------------------------------

////echo $_GET["laboratorio"]."->laboratorio</br>";

////echo $_GET["observaciones"]."->observaciones</br>";

////echo $_GET["clinicamente"]."->clinicamente</br>";

////echo $_GET["recomendacion"]."->recomendacion</br>";

//-----------------------------------------------



$form_data = array(
':id' => $fol,
':id_paciente' => $_GET["pacientes"],
':hipertension_arterial' => $hipertension,
':cardiopatias' => $cardiopatia,
':diabetes_mellitus' => $diabetes,
':nefropatias' => $nefropatias,
':retinopatias' => $retinopatias,
':cancer_de' => $_GET["cancer"],
':crisis_convulsivas' => $convulsion,
':personales_patologicos_otros' => $_GET["b_otras"],
':usa_lentes_graduados' => $usolentes,
':usa_lentes_tiempo' => $tiempo,
':usa_lentes_armazon' => $larmazon,
':usa_lentes_contacto' => $lcontacto,
':miopia' => $mipia,
':hipermetropia' => $hipermetropia,
':astigmatismo' => $astigmatismo,
':agudeza_auditiva' => $_GET["c_auditiva"],
':antecedentes_quirurgicos' => $_GET["aquirurgicos"],
':peso' => $_GET["peso"],
':talla' => $_GET["talla"],
':fc' => $_GET["fc"],
':fr' => $_GET["fr"],
':ta' => $_GET["ta"],
':temp' => $_GET["temperatura"],
':craneo' => $_GET["craneo"],
':alcoholismo' => $alcoholismo,
':tabaquismo' => $tabaquismo,
':folio' => $folio,
':grupo_sanguineo' => $_GET["gruposan"],
':observaciones' => $_GET["observaciones"],
':recomendaciones' => $_GET["recomendacion"],
':alergias_medicamento_cual' => $_GET["alergiasm"],
':cardiopulmonar' => $_GET["cardiopulmunar"],
':cuello' => $_GET["cuello"],
':estado_clinico' => $_GET["clinicamente"],
':examenes_laboratorio' => $_GET["laboratorio"],
':extremidades' => $_GET["extremidades"],
':a_auditiva' => $_GET["aauditiva"],
':abdomen' => $_GET["abdomen"],
':alergias' => $nalergia,
':alergias_alimento_cual' => $_GET["alergiasa"],
':alergias_animales_cual' => $_GET["alergiasan"],
':usa_lentes_anos' => $tiempod,
':usa_lentes_meses' => $tiempod,
':heredofamiliares_otras'=> $_GET["c_otras"]
);


$query = "	INSERT INTO examen_medico 
(id,id_paciente,hipertension_arterial,cardiopatias,diabetes_mellitus,nefropatias,retinopatias,cancer_de,
crisis_convulsivas,personales_patologicos_otros,usa_lentes_graduados,usa_lentes_tiempo,usa_lentes_armazon,
usa_lentes_contacto,miopia,hipermetropia,astigmatismo,agudeza_auditiva,antecedentes_quirurgicos,peso,
talla,fc,fr,ta,temp,craneo,alcoholismo,tabaquismo,fecha_examen,folio,grupo_sanguineo,observaciones,recomendaciones,
alergias_medicamento_cual,cardiopulmonar,cuello,estado_clinico,examenes_laboratorio,extremidades,a_auditiva,
abdomen,alergias,alergias_alimento_cual,alergias_animales_cual,usa_lentes_anos,usa_lentes_meses,
alergias_alimento,alergias_medicamento,alergias_animales,heredofamiliares_otras
)
VALUES 
(
:id,:id_paciente,:hipertension_arterial,:cardiopatias,:diabetes_mellitus,:nefropatias,:retinopatias,:cancer_de,
:crisis_convulsivas,:personales_patologicos_otros,:usa_lentes_graduados,:usa_lentes_tiempo,:usa_lentes_armazon,
:usa_lentes_contacto,:miopia,:hipermetropia,:astigmatismo,:agudeza_auditiva,:antecedentes_quirurgicos,:peso,
:talla,:fc,:fr,:ta,:temp,:craneo,:alcoholismo,:tabaquismo,now(),:folio,:grupo_sanguineo,:observaciones,:recomendaciones
,:alergias_medicamento_cual,:cardiopulmonar,:cuello,:estado_clinico,:examenes_laboratorio,:extremidades,:a_auditiva,
:abdomen,:alergias,:alergias_alimento_cual,:alergias_animales_cual,case when :usa_lentes_anos='a' then 1 else 0 end,
case when :usa_lentes_meses='m' then 1 else 0 end,
case when length(:alergias_alimento_cual)>0 then 1 else 0 end,case when length(:alergias_medicamento_cual)>0 then 1 else 0 end,case when length(:alergias_animales_cual)>0 then 1 else 0 end,:heredofamiliares_otras
)";



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
		

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tejeda Silva Gerardo Fabian');
$pdf->SetTitle('Examen medico');

$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20, 0); 
$pdf->SetAutoPageBreak(true, 10); 
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();

   // Image example with resizing
   //$pdf->Image('img/imagen.png', 0, 0, 230, 350, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

  //logo
  $pdf->SetXY(0, 0);  
  $pdf->Image('img/logos.png', 7, '', 200, 35, '', '', '', false, 300, '', false, false, 1, false, false, false);

    //footer  
  //$pdf->Image('img/footer.png', 107, 248, 100, 39, '', '', '', true, 300, '', false, false, 1, false, false, false);

   //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 30); 
  $pdf->SetFont('Helvetica', '', 14);
	$content = '<b>Departamento de Atención y Promoción a la Salud</b>';	
	$pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 37); 
  $pdf->SetFont('Helvetica', '', 14);
  $content = '<b>Certificado Médico</b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 49); 
  $pdf->SetFont('Helvetica', '', 11);
  $content = 'Ex Hacienda de Santa Bárbara, Rancho Luna Municipio de Zempoala Hgo.'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 55);   
  $content = 'Fecha: Día: '.date("d",time()).' / Mes: '.date("m",time()).' / Año: '.date("Y",time()).' '; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 62); 
  $pdf->SetFont('Helvetica', '', 13);
  $content = '<b>A QUIEN CORRESPONDA:</b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 70); 
  $pdf->SetFont('Helvetica', '', 13);
  $content = '<b>P R E S E N T E</b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 79); 
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<spam>El que suscribe Médico Legalmente autorizado para ejercer la Profesión Adscrito al servicio; hace</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 85); 
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<spam>constancia del estado de salud de:</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 94); 
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<spam>FICHA DE IDENTIFICACIÓN </spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 100);   
  $content = '<spam>Programa Educativo:____________________________________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);
  

  $pdf->SetXY(70, 100);   
  $content =  $_GET["descripcion"]; 
  $pdf->writeHTML($content, true, 0, true, 0);


  $pdf->SetXY(144, 100);   
  $content = '<spam>Matrícula:  <u>     '.$_GET["matricula"].'     </u></spam>';                                    
  $pdf->writeHTML($content, true, 0, true, 0);
  
  //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 106);   
  $content = '<spam>Nombre del estudiante:__________________________________</spam>';                                          
  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->SetXY(55, 106);   
  $content =  $_GET["nombre"]; 
  $pdf->writeHTML($content, true, 0, true, 0);


  $pdf->SetXY(125, 106);   
  $content = '<spam>Género:_________</spam>';                            
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(140, 106);   
  $content = $_GET["genero"];                          
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(161, 106);   
  $content = '<spam>Edad:________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(172, 106);   
  $content = $_GET["edad"]. ' años';                          
  $pdf->writeHTML($content, true, 0, true, 0); 


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 112);   
  $content = '<spam>Lugar de Orígen:___________________________________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(42, 112);   
  $content = $_GET["origen"];                          
  $pdf->writeHTML($content, true, 0, true, 0); 


  $pdf->SetXY(132, 112);   
  $content = '<spam>Estado:____________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(150, 112);   
  $content = $_GET["estado"];
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 118);   
  $content = '<spam>Residencia:__________________________________________________________________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->SetXY(35, 118);   
  $content = $_GET["residencia"];
  $pdf->writeHTML($content, true, 0, true, 0);  


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 127);   
  $content = '<spam>Posterior a un interrogatorio y evaluación clínica se determina  lo siguiente:</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 135);   
  $content = '<spam>A. Heredofamiliares: </spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  


  $pdf->SetXY(47, 135);   
  if($hipertension>0){$content = '<b><i><strike><label>Hipertensión Arterial, </label></strike></i></b>'; }
  else{$content = '<label>Hipertensión Arterial, </label>'; }  
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(90, 135);   
  if($cardiopatia>0){$content = '<b><i><strike><label>Cardiopatías, </label></strike></i></b>'; }
  else{$content = '<label>Cardiopatías, </label>'; }     
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(118, 135);   
  if($diabetes>0){$content = '<b><i><strike><label>Diabetes Mellitus, </label></strike></i></b>'; }
  else{$content = '<label>Diabetes Mellitus, </label>'; }    
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(160, 135);   
  if($nefropatias>0){$content = '<b><i><strike><label>Nefropatías, </label></strike></i></b>'; }
  else{$content = '<label>Nefropatías, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 141);
  if($retinopatias>0){$content = '<b><i><strike><label>Retinopatías, </label></strike></i></b>'; }
  else{$content = '<label>Retinopatías, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(37, 141);   
  $content = 'Cáncer de __________________,'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(58, 141);   
  $content = $_GET["cancer"]; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(97, 141);   
  if($convulsion>0){$content = '<b><i><strike><label>Crisis convulsivas, </label></strike></i></b>'; }
  else{$content = '<label>Crisis convulsivas, </label>'; }    
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(134, 141);   
  $content = '<i><label>Otras:____________________</label></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(150, 141);   
  $content = $_GET["a_otras"];   
  $pdf->writeHTML($content, true, 0, true, 0);  


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 147);   
  $content = '<label>B. Personales no Patológicos: Toxicomanías: </label>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(90, 147);   
  if($alcoholismo>0){$content = '<b><i><strike><label>Alcoholismo, </label></strike></i></b>'; }
  else{$content = '<label>Alcoholismo, </label>'; }    
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(116, 147);     
  if($tabaquismo>0){$content = '<b><i><strike><label>Tabaquismo, </label></strike></i></b>'; }
  else{$content = '<label>Tabaquismo, </label>'; }    
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(140, 147);   
  $content = '<label>Otras:__________________</label>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(155, 147);   
  $content =  $_GET["b_otras"];  
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 153);   
  $content = '<label>C. Personales Patológicos: _____________________________________________________________</label>';
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(62, 153);   
  $content =  $_GET["c_otras"];  
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 159);   
  $content = '<label>D. Agudeza Visual:</label>';
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(44, 159);   
  if($usolentes>0){$content = '<b><i><strike><label>Uso de Lentes graduados, </label></strike></i></b>'; }
  else{$content = '<label>Uso de Lentes graduados, </label>'; }    
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(94, 159);   
  $content = '<b><i><label>desde hace cuánto tiempo:_______</label></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(148, 159);   
  $content =  $tiempo;  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(160, 159);   
  if($tiempod=="m"){$content = '<b><i><strike><label>Meses, </label></strike></i></b>'; }
  else{$content = '<label>Meses, </label>'; }        
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(176, 159);     
  if($tiempod=="a"){$content = '<b><i><strike><label>Años. </label></strike></i></b>'; }
  else{$content = '<label>Años. </label>'; }        
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 165);     
  if($larmazon>0){$content = '<b><i><strike><label>Anteojos de armazón, </label></strike></i></b>'; }
  else{$content = '<label>Anteojos de armazón, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(55, 165);     
  if($lcontacto>0){$content = '<b><i><strike><label>Lentes de Contacto, </label></strike></i></b>'; }
  else{$content = '<label>Lentes de Contacto, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0); 
 
 //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 171);     
  if($mipia>0){$content = '<b><i><strike><label>Miopía, </label></strike></i></b>'; }
  else{$content = '<label>Miopía, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(30, 171);     
  if($hipermetropia>0){$content = '<b><i><strike><label>Hipermetropía, </label></strike></i></b>'; }
  else{$content = '<label>Hipermetropía, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(65, 171);   
  if($astigmatismo>0){$content = '<b><i><strike><label>Astigmatismo, </label></strike></i></b>'; }
  else{$content = '<label>Astigmatismo, </label>'; }      
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(100, 171);   
  $content = '<b><i><label> Agudeza Auditiva:__________________</label></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(138, 171);   
  $content =  $_GET["aauditiva"];  
  $pdf->writeHTML($content, true, 0, true, 0);

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 177);   
  $content = '<i><label>E: Antecedentes quirúrgicos:____________________________________________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(62, 177);   
  $content =  $_GET["aquirurgicos"];  
  $pdf->writeHTML($content, true, 0, true, 0);     

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 184);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<b><i><label>Examen Físico:</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0);   

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 192);     
  $content = '<i><label>Peso: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(23, 192);     
  $content =  $_GET["peso"];  
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(40, 192);     
  $content = '<i><label>Talla: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(50, 192);     
  $content =  $_GET["talla"];  
  $pdf->writeHTML($content, true, 0, true, 0);    

  $pdf->SetXY(70, 192);     
  $content = '<i><label>FC: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(80, 192);     
  $content =  $_GET["fc"];  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(100, 192);     
  $content = '<i><label>FR:__________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);    

  $pdf->SetXY(108, 192);     
  $content =  $_GET["fr"];  
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(130, 192);     
  $content = '<i><label>T/A:_________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(139, 192);     
  $content =  $_GET["ta"];  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(159, 192);     
  $content = '<i><label>Temp:________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(172, 192);     
  $content =  $_GET["temperatura"];  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 200);     
  $content = '<i><label>Cráneo: __________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(28, 200);     
  $content = $_GET["craneo"];  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(67, 200);     
  $content = '<i><label>Cuello: ____________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(82, 200);     
  $content = $_GET["cuello"];   
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(125, 200);     
  $content = '<i><label>Cardiopulmonar: ________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(155, 200);     
  $content =$_GET["cardiopulmunar"];  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 208);     
  $content = '<i><label>Abdomen:_________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);    

  $pdf->SetXY(31, 208);     
  $content = $_GET["abdomen"];
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(67, 208);     
  $content = '<i><label>Extremidades: __________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(94, 208);     
  $content =$_GET["extremidades"];   
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(134, 208);     
  $content = '<i><label>A. Auditiva: ________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(155, 208);     
  $content = $_GET["aauditiva"];  
  $pdf->writeHTML($content, true, 0, true, 0); 


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 218);     
  $content = '<i><label>Grupo Sanguíneo: ____________  Alergias alimentos: _______________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 
  
  $pdf->SetXY(50, 218);    
  if(strlen($_GET["gruposan"])>2){
  $content = substr($_GET["gruposan"], 0, 2).' Rh: '.substr($_GET["gruposan"], 2, 1);	
  } else{
  $content = substr($_GET["gruposan"], 0, 1).' Rh: '.substr($_GET["gruposan"], 1, 1);	
  }  
  $pdf->writeHTML($content, true, 0, true, 0); 



  $pdf->SetXY(105, 218);  
  $content = $_GET["alergiasa"];
  $pdf->writeHTML($content, true, 0, true, 0);  


//------------------------------ Inicia Renglon
  
  $pdf->SetXY(90, 226);     
  $content = '<i><label>Medicamentos:_______________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(120, 226);     
  $content = $_GET["alergiasm"];  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(10, 226);     
  $content = '<i><label>Animales:_______________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(28, 226);     
  $content = $_GET["alergiasan"];  
  $pdf->writeHTML($content, true, 0, true, 0); 


  $pdf->SetXY(65, 226);     
    if(strlen($_GET["alergiasm"])>0 && strlen($_GET["alergiasa"])>0 && strlen($_GET["alergiasan"])>0){
  $content = '<b><i><strike><label>Ninguna,</label><strike></b></i>'; 	
  }
  else{
  	$content = '<label>Ninguna,</label>'; 
  }  
  $pdf->writeHTML($content, true, 0, true, 0); 


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 236);     
  $content = '<i><label>Exámenes de laboratorio: _________________________________________________________________________________________________________________________________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(60, 236);     
  $content = $_GET["laboratorio"];  
  $pdf->writeHTML($content, true, 0, true, 0);   
 
//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 265);     
  $pdf->SetFont('Helvetica', '', 8);
  $content = '<DIV align="right">
 Universidad Politécnica de Pachuca<br>
 Carr. Pachuca-Cd. Sahagún, km 20, Ex-Hacienda de<br>
 Santa Bárbara, Zempoala, Hidalgo, c.p. 43830.<br>
 Tel.: 01 (771) 547 7510<br>
 www.upp.edu.mx<br>
</DIV>';  
  $pdf->writeHTML($content, true, 0, true, 0); 
    
   
//------------------------------ Nueva pagina
  $pdf->addPage();

  //logo
  $pdf->SetXY(0, 0);  
  $pdf->Image('img/logos.png', 7, '', 200, 35, '', '', '', false, 300, '', false, false, 1, false, false, false);

  //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 265);     
  $pdf->SetFont('Helvetica', '', 8);
  $content = '<DIV align="right">
 Universidad Politécnica de Pachuca<br>
 Carr. Pachuca-Cd. Sahagún, km 20, Ex-Hacienda de<br>
 Santa Bárbara, Zempoala, Hidalgo, c.p. 43830.<br>
 Tel.: 01 (771) 547 7510<br>
 www.upp.edu.mx<br>
</DIV>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
    $pdf->SetXY(10, 35);     
    $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>  Observaciones: ___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(45, 35);     
  $pdf->SetFont('Helvetica', '', 11);
  $content = $_GET["observaciones"];  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 120);     
  $content = '<b><i><label>Encontrándose Clínicamente:________________________________________________________________________________________________________________________________________</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(70, 120);     
  $content = $_GET["clinicamente"];  
  $pdf->writeHTML($content, true, 0, true, 0); 
  
//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 135);     
  $content = '<b><i><label>RECOMENDACIÓN:________________________________________________________________________________________________________________________________________________</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

    $pdf->SetXY(50, 135);     
  $content = $_GET["recomendacion"];  
  $pdf->writeHTML($content, true, 0, true, 0); 


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 157);     
  $content = '<b><i><label>PERSONAL DE SALUD QUE ELABORÓ EL EXÁMEN MÉDICO:</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(160, 157);     
  $content = '<b><i><label style="color:#FF0000"; align="right">'.$folio.'</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 167);     
  $content = '<b><i><label>MÉDICO CIRUJANO TANIA INÉS APARICIO MONROY CED. PROF. 20102891</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 177);     
  $content = '<b><i><label>MÉDICO CIRUJANO LUIS MIGUEL ACUÑA LÓPEZ CED. PROF.</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

    

  $pdf->lastPage();
  $pdf->output($folio.'_'.$_GET["matricula"].'.pdf', 'D');
  $pdf->SetAutoPageBreak(TRUE, 0);


$url = $_SERVER['HTTP_REFERER'];
header('Location: ../inicio.php');
echo '<script type="text/javascript">alert("lo que quieras");</script>'; 

	
?>