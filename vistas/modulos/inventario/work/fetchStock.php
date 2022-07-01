<?php

//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=stock&id=".$_POST['id'];

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '	<div id="respuesta">

      <div class="box-body">
        
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>           
           <th style="width:10px">#</th>
			<th>caducidad</th>
			<th>contenido</th>
			
         </tr> 

        </thead>

        <tbody>';




if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>		    
			<td>'.$row->id_caja.'</td>
			<td>'.$row->caducidad.'</td>
			<td>'.$row->contenido.'</td>			
			<input type="hidden" name="hidden_idm" id="hidden_idm" value="'.$row->id_caja.'" /> <!--Valor para ID-->
		</tr>
		';
	}

		$output .= '        </tbody>

       </table>

    </div>
      </div>';


}
else
{
		$output .= '        </tbody>

       </table>

    </div>
      </div>';
}

echo $output;

?>