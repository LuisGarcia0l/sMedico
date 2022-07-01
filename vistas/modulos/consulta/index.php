<?php 


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





	require_once('conexion/conexion.php');	
	$usuario = 'SELECT * FROM usuarios ORDER BY id DESC';	
	$usuarios=$mysqli->query($usuario);
	
if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
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

  $pdf->SetXY(144, 100);   
  $content = '<spam>Matrícula:  <u>     1631113184     </u></spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);
  
  //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 106);   
  $content = '<spam>Nombre del estudiante:___________________________________</spam>';                                          
  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->SetXY(125, 106);   
  $content = '<spam>Género: <u> Masculino </u></spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(161, 106);   
  $content = '<spam>Edad: <u>34 años </u></spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 112);   
  $content = '<spam>Lugar de Orígen:___________________________________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(132, 112);   
  $content = '<spam>Estado:____________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 118);   
  $content = '<spam>Residencia:__________________________________________________________________________</spam>'; 
  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->SetXY(50, 118);   
  $content = '<spam>jazmin</spam>'; 
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
  $content = '<b><i><strike><label>Hipertensión Arterial, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(90, 135);   
  $content = '<b><i><strike><label>Cardiopatías, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(118, 135);   
  $content = '<b><i><strike><label>Diabetes, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(139, 135);   
  $content = '<b><i><strike><label>Mellitus, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(160, 135);   
  $content = '<b><i><strike><label>Nefropatías, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 141);   
  $content = '<b><i><strike><label>Retinopatías, </label></strike></i></b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(37, 141);   
  $content = '<b>Cáncer de __________________,</b>'; 
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(97, 141);   
  $content = '<b><i><strike><label>Crisis convulsivas,</label></strike></i></b>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(134, 141);   
  $content = '<b><i><label>Otras:____________________</label></i></b>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 147);   
  $content = '<label>B. Personales no Patológicos: Toxicomanías: </label>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(90, 147);   
  $content = '<b><i><strike><label>Alcoholismo,</label></strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(116, 147);   
  $content = '<b><i><strike><label>Tabaquismo,</label></strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(140, 147);   
  $content = '<label>Otras:__________________</label>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 153);   
  $content = '<label>C. Personales Patológicos: _____________________________________________________________</label>';
  $pdf->writeHTML($content, true, 0, true, 0);  

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 159);   
  $content = '<label>D. Agudeza Visual:</label>';
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(44, 159);   
  $content = '<b><i><strike><label>Uso de Lentes graduados,</label></strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(94, 159);   
  $content = '<b><i><label>desde hace cuánto tiempo:_______</label></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(160, 159);   
  $content = '<b><i><strike><label>meses,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(176, 159);   
  $content = '<b><i><strike><label>años.</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 165);   
  $content = '<b><i><strike><label>Anteojos de armazón,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(55, 165);   
  $content = '<b><i><strike><label>Lentes de Contacto,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0); 
 
 //------------------------------ Inicia Renglon
  $pdf->SetXY(10, 171);   
  $content = '<b><i><strike><label>Miopía,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(30, 171);   
  $content = '<b><i><strike><label>Hipermetropía,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);  

  $pdf->SetXY(65, 171);   
  $content = '<b><i><strike><label>Astigmatismo,</label><strike></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(100, 171);   
  $content = '<b><i><label> Agudeza Auditiva:__________________</label></b></i>';   
  $pdf->writeHTML($content, true, 0, true, 0);     

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 177);   
  $content = '<i><label>E: Antecedentes quirúrgicos:____________________________________________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 184);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<b><i><label>Examen Físico:</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0);   

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>Peso: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(40, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>Talla: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(70, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>FC: ________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(100, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>FR:__________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(130, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>T/A:_________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

  $pdf->SetXY(159, 192);   
  $pdf->SetFont('Helvetica', '', 11);
  $content = '<i><label>Temp:________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);     

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 200);     
  $content = '<i><label>Cráneo: __________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(67, 200);     
  $content = '<i><label>Cuello: ____________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(125, 200);     
  $content = '<i><label>Cardiopulmonar: ________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 208);     
  $content = '<i><label>Abdomen:_________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(67, 208);     
  $content = '<i><label>Extremidades: __________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0);       

  $pdf->SetXY(134, 208);     
  $content = '<i><label>A. Auditiva: ________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 218);     
  $content = '<i><label>Grupo Sanguíneo: ______Rh:___  Alergias: Alimento, Medicamento a cual.________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 226);     
  $content = '<i><label>Animales:____ninguna</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 236);     
  $content = '<i><label>Exámenes de laboratorio: ______________________________________________________________</label></i>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 244);     
  $content = '<i><label>___________________________________________________________________________________</label></i>';  
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

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 120);     
  $content = '<b><i><label>Encontrándose Clínicamente:________________________________________________________________________________________________________________________________________</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 135);     
  $content = '<b><i><label>RECOMENDACIÓN:________________________________________________________________________________________________________________________________________________</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 


//------------------------------ Inicia Renglon
  $pdf->SetXY(10, 157);     
  $content = '<b><i><label>PERSONAL DE SALUD QUE ELABORÓ EL EXÁMEN MÉDICO:</label></i></b>';  
  $pdf->writeHTML($content, true, 0, true, 0); 

  $pdf->SetXY(160, 157);     
  $content = '<b><i><label style="color:#FF0000"; align="right">Folio. A/ 0001</label></i></b>';  
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
	$pdf->output('Reporte.pdf', 'I');
  $pdf->SetAutoPageBreak(TRUE, 0);
}

?>
		 
          
        
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF - Miguel Angel Caro Rojas</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Reporte de Empleados - Enero 2017";  
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>DNI</th>
            <th>A. PATERNO</th>
            <th>A. MATERNO</th>
            <th>NOMBRES</th>
            <th>AREA</th>
            <th>SUELDO</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			while ($user=$usuarios->fetch_assoc()) {   ?>
          <tr class="<?php if($user['activo']=='A'){ echo 'active';}else{ echo 'danger';} ?>">
            <td><?php echo $user['dni']; ?></td>
            <td><?php echo $user['paterno']; ?></td>
            <td><?php echo $user['materno']; ?></td>
            <td><?php echo $user['nombres']; ?></td>
            <td><?php echo $user['area']; ?></td>
            <td>S/. <?php echo $user['sueldo']; ?></td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
      	</div>
    </div>
</body>
</html>