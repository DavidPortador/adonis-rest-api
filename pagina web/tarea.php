<?php
	session_start();
	if(!isset($_SESSION['token'])){
		header('location: index.php?e=2'); // Fallida 2
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.82.0">
		<title>User</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<nav class="navbar navbar-expand-lg bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="user.php">User</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link" href="proyecto.php">Proyectos</a>
					</li>
				</ul>
				<a class="nav-item nav-link text-danger" href="index.php">Cerrar</a>
				<span class="text text-white">
					<?=$_SESSION['email'];?>
				</span>
				</div>
			</div>
		</nav>
		<div class="container text-center mt-3">
			<?php
				$url = "http://tareasadonis.herokuapp.com/api/v1/proyectos/".$_SESSION['id']."/tareas";
				// Crear opciones de la petición HTTP
				$opciones = array(
					"http" => array(
						"header" => "Content-type: application/x-www-form-urlencoded\r\n".
									"Authorization: ".$_SESSION['type']." ".$_SESSION['token']."\r\n",
						"method" => "GET"
					),
				);
				// Preparar petición
				$contexto = stream_context_create($opciones);
				// Hacer peticion
				$resultado = file_get_contents($url, false, $contexto);
				if ($resultado === false){
					header('location: index.php?e=1'); // Fallida 1
				}else{
					$datos = json_decode($resultado);
					//print_r($datos);
					echo "<h3>Tareas del Proyecto ".$_SESSION['id']."</h3>";							
					echo '<table class="table table-bordered border-dark">';					
					echo '<th colspan="2" class="bg-success text-white">POST
								<form method="post" action="tarea/CRUD.php">
								<input type="image" src="https://cdn-icons-png.flaticon.com/512/32/32360.png" width="30px" />
								<input type="hidden" name="tipo" value="po" />
								</form>
							</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">id</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">proyecto_id</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">descripcion</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">completada</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">created_at</th>';
					echo '<th valign="middle" align="center" rowspan="2" class="bg-info text-black">updated_at</th>';
					echo "<tr>";
					echo '<th class="bg-danger text-white">DEL</th>';
					echo '<th class="bg-warning text-dark">PATCH</th>';
					echo "</tr>";					
					foreach ($datos as $value) {
						echo "<tr>";
						echo '<td><form method="post" action="tarea/CRUD.php">';
						echo '<input type="image" src="https://cdn-icons-png.flaticon.com/512/1214/1214594.png" width="30px" />';
						echo '<input type="hidden" name="id" value="'.$value->id.'" />';
						echo '<input type="hidden" name="tipo" value="de" />';
						echo '</form></td>';
						echo '<td><form method="post" action="tarea/CRUD.php">';
						echo '<input type="image" src="https://cdn-icons-png.flaticon.com/512/104/104668.png" width="30px" />';
						echo '<input type="hidden" name="id" value="'.$value->id.'" />';
						echo '<input type="hidden" name="descripcion" value="'.$value->descripcion.'" />';
						echo '<input type="hidden" name="tipo" value="pa" />';
						echo '</form></td>';
						echo "<td>$value->id</td>";
						echo "<td>$value->proyecto_id</td>";
						echo "<td>$value->descripcion</td>";
						echo "<td>$value->completada</td>";
						echo "<td>$value->created_at</td>";
						echo "<td>$value->updated_at</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				if(isset($_GET['c'])){
					if ($_GET['c'] == 1){
					echo "<div class='text-success mt-2'> Tarea Registrada</div>";
					}else if ($_GET['c'] == 2){
						echo "<div class='text-success mt-2'> Tarea Actualizada</div>";
					}
				}
			?>
		</div>
	</body>
</html>
