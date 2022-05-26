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
				<a class="navbar-brand" href="">User</a>
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
		<div class="container mt-5">
			<h2>Hello user <b><i><?=$_SESSION['email'];?></i></b><br></h2>
			type:
			<b><i><?=$_SESSION['type'];?></i></b><br>
			token:
			<b><i><?=$_SESSION['token'];?></i></b><br>
			<img src="https://c.tenor.com/3I8rtbK5YbIAAAAM/marcianito-cumbiero.gif" alt="marcianito">
		</div>
	</body>
</html>