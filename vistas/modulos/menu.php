<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

			echo '<li class="active">

				<a href="inventario">

					<i class="fa fa-id-card"></i>
					<span>Inventario</span>

				</a>

			</li>';

			echo '<li class="active">

				<a href="stock">

					<i class="fa fa-cube"></i>
					<span>Stock</span>

				</a>

			</li>';			
						

		}


		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="ProgramaEducativo">

					<i class="fa fa-graduation-cap"></i>
					<span>Programa educativo</span>

				</a>

			</li>';


			echo '<li class="active">

				<a href="diagnosticos">

					<i class="fa fa-plus-square"></i>
					<span>Diagnosticos</span>

				</a>

			</li>';


			echo '<li class="active">

				<a href="paciente">

					<i class="fa fa-ambulance"></i>
					<span>Pacientes</span>

				</a>

			</li>';			

			echo '<li class="active">

				<a href="consulta">

					<i class="fa fa-thermometer-full"></i>
					<span>Consulta</span>

				</a>

			</li>';	

			echo '<li class="active">

				<a href="historico">

					<i class="fa fa-file"></i>
					<span>Historico</span>

				</a>

			</li>';			

			echo '<li class="active">

				<a href="examen">

					<i class="fa fa-heartbeat"></i>
					<span>Examen medico</span>

				</a>

			</li>';	



		}




		if($_SESSION["perfil"] == "Medico"){



			echo '<li class="active">

				<a href="paciente">

					<i class="fa fa-ambulance"></i>
					<span>Pacientes</span>

				</a>

			</li>';			

			echo '<li class="active">

				<a href="consulta">

					<i class="fa fa-thermometer-full"></i>
					<span>Consulta</span>

				</a>

			</li>';	

			echo '<li class="active">

				<a href="historico">

					<i class="fa fa-file"></i>
					<span>Historico</span>

				</a>

			</li>';			

			echo '<li class="active">

				<a href="examen">

					<i class="fa fa-heartbeat"></i>
					<span>Examen medico</span>

				</a>

			</li>';	



		}



		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){


				

				echo '</ul>

			</li>';

		}

		?>

		</ul>

	 </section>

</aside>