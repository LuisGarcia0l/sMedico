<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<form name="prueba" method="POST">
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar medicamento
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar medicamento</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" type="button" name="add_button" id="add_button">
          
          Agregar medicamento

        </button>

      </div>

	<div id="respuesta">

      <div class="box-body">
        
       <table id="example2" class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>           
           <th style="width:10px">#</th>
			<th>Medicamento</th>
			<th>Presentación</th>
			<th>Tipo</th>
			<th>Lote</th>
            <th>Fecha Entrada</th>
            <th>Fecha Caducidad</th>
			<th>Editar</th>
			<th>Borrar</th>
         </tr> 

        </thead>

        <tbody>


<?php

//fetch.php

$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
		    <td>'.$row->id.'</td>
			<td>'.$row->nombre.'</td>
			<td>'.$row->presentacion.'</td>
			<td>'.$row->tipo.'</td>
			<td>'.$row->clave.'</td>
            <td>'.$row->fechaentrada.'</td>
            <td>'.$row->fechacaducidad.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Editar</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Borrar</button></td>
			<input type="hidden" name="hidden_idm" id="hidden_idm" value="'.$row->id.'" /> <!--Valor para ID-->
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No se encontro información</td>
	</tr>
	';
}

echo $output;

?>
        </tbody>

       </table>

    </div>
      </div>

    </div>

  </section>

</div>

</form>

<!--Sistema para anuncios tipo alerta-->

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<h4 class="modal-title">Agregar Medicamento</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Ingresa el nombre del medicamento</label>
			        	<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ex. Paracetamol"/>
			        </div>
			        <div class="form-group">
			        	<label>Ingresa su presentación</label>
			        	<input type="text" name="presentacion" id="presentacion" class="form-control" placeholder="Tabletas"/>
			        </div>
					<div class="form-group">
			        	<label>Selecciona su tipo</label>
			        	<select name="tipo" id="tipo" class="form-control">
							<option value="Material">Material</option>
							<option value="Planeacion">Planeación</option>
							<option value="Medicamento">Medicamento</option>
						</select>
			        </div>
					<div class="form-group">
                        <label>Ingresa su fecha de ingreso</label>
                        <input type="text" name="fechaentrada" id="fechaentrada" class="form-control" placeholder="29/06/2022"/>
                    </div>
                    <div class="form-group">
                        <label>Ingresa el lote</label>
                        <input type="text" name="clave" id="clave" class="form-control" placeholder="B9698B097"/>
                    </div>
                    <div class="form-group">
                        <label>Ingresa su fecha de caducidad</label>
                        <input type="text" name="fechacaducidad" id="fechacaducidad" class="form-control" placeholder="30/10/2022"/>
                    </div>
                </div>

			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" /> <!--Valor para ID-->			    	
			    	<input type="hidden" name="action" id="action" value="insert" /> <!--Valor para accion a Realizar-->
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insertar" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>





<!--Acciones para los botones-->

<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"vistas/modulos/inventario/work/fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}


	$('#add_button').click(function(){
		$('#action').val('insert'); //Linea Repetitiva?
		$('#button_action').val('Insertar'); //Linea Repetitiva?
		$('.modal-title').text('Agregar medicamento');
		$('#apicrudModal').modal('show');
	});





	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#nombre').val() == '')
		{
			alert("Ingresa el nombre del medicamento");
		}
		else if($('#presentacion').val() == '')
		{
			alert("Ingresa su presentación");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"vistas/modulos/inventario/work/action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Registró insertado correctamente");
					}
					if(data == 'update')
					{
						alert("Información actualizada");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"vistas/modulos/inventario/work/action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
                $('#nombre').val(data.nombre);
                $('#presentacion').val(data.presentacion);
                $('#clave').val(data.clave);
                $('#fechaentrada').val(data.FechadeEntrada);
                $('#fechacaducidad').val(data.FechadeCaducidad);
                //$('#tipo').val(data.tipo); ITEM SELECCIONADO
                $('#action').val('update');
                $('#button_action').val('Update');
                $('.modal-title').text('Editar información');
                $('#apicrudModal').modal('show');
            }

		})
	});

	$(document).on('click', '.stock', function(){


	        var id = 1;
		$.ajax({
			url:"vistas/modulos/inventario/work/fetchStock.php?id="+id,
			method:"GET",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
				
		
	});


	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("¿Estas seguro de borrar este registró?"))
		{
			$.ajax({
				url:"vistas/modulos/inventario/work/action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Información borrada");
				}
			});
		}
	});

});
</script>
<script>	
$(document).ready(function() { $('#example2').DataTable(); } );
</script>