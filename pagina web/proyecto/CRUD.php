<?php
    session_start();
    if(isset($_POST['tipo'])){
        switch ($_POST['tipo']) {
          case 'de': //del
              $url = "http://tareasadonis.herokuapp.com/api/v1/proyectos/".$_POST['id'];
              // Crear opciones de la petición HTTP
              $opciones = array(
                "http" => array(
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n".
                                "Authorization: ".$_SESSION['type']." ".$_SESSION['token']."\r\n",
                    "method" => "DELETE"
                ),
              );
              // Preparar petición
              $contexto = stream_context_create($opciones);
              // Hacer peticion
              $resultado = file_get_contents($url, false, $contexto);
              if ($resultado === false){
                header('location: ../index.php?e=1'); // Fallida 1
              }else{
                $datos = json_decode($resultado);
                //print_r($datos);
                header('location: ../proyecto.php?c=1'); // Exitosa
              }
              break;            
          case 'pa': //patch
              if(isset($_POST['nombre'])){
                echo '<!doctype html>
                <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                    <meta name="generator" content="Hugo 0.82.0">
                    <title>UPDATE PROJECT</title>
                    <!-- Bootstrap core CSS -->
                    <link href="../css/bootstrap.min.css" rel="stylesheet">
                    <!-- Custom styles for this template -->
                    <link href="../css/signin.css" rel="stylesheet">
                  </head>
                  <body class="text-center">
                    <main class="form-signin">
                      <form method="post" action="../class/updateP.php">
                        <h1 class="h3 mb-3 fw-normal">Update Project</h1>
                        <div class="form-floating">
                          <input name="nombre" type="text" class="form-control" id="floatingInput" placeholder="Name" required />
                          <label for="floatingInput">'.$_POST['nombre'].'</label>
                        </div>
                        <input type="hidden" name="id" value="'.$_POST['id'].'" />
                        <button class="w-100 btn btn-lg btn-primary mt-3 mb-3" type="submit">Update</button>
                      </form>
                    </main>
                  </body>
                </html>';
              }
              break;
          case 'ge': //get
              if(isset($_POST['id'])){
                $_SESSION['id'] = $_POST['id'];
                header('location: ../tarea.php'); // Exitosa
              }else{
                header('location: ../index.php?e=3'); // Fallida 3
              }
              break;
          case 'po': //post
              echo '<!doctype html>
              <html lang="en">
                <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <meta name="description" content="">
                  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                  <meta name="generator" content="Hugo 0.82.0">
                  <title>INSERT PROJECT</title>
                  <!-- Bootstrap core CSS -->
                  <link href="../css/bootstrap.min.css" rel="stylesheet">
                  <!-- Custom styles for this template -->
                  <link href="../css/signin.css" rel="stylesheet">
                </head>
                <body class="text-center">
                  <main class="form-signin">
                    <form method="post" action="../class/insertP.php">
                      <h1 class="h3 mb-3 fw-normal">New Project</h1>
                      <div class="form-floating">
                        <input name="nombre" type="text" class="form-control" id="floatingInput" placeholder="Name" required />
                        <label for="floatingInput">Name</label>
                      </div>
                      <button class="w-100 btn btn-lg btn-primary mt-3 mb-3" type="submit">Create</button>
                    </form>
                  </main>
                </body>
              </html>';
              break;
          default:
              header('location: ../index.php?e=3'); // Fallida 3
              break;
        }
    }else{
        header('location: ../index.php?e=3'); // Fallida 3
    }
?>