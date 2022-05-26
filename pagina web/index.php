<?php
  session_start();
  session_unset();
  session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form method="post" action="class/validator.php">
        <img class="mb-4" src="https://icons-for-free.com/download-icon-adonisjs-1324440116642911008_512.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Adonis Rest Api</h1>
        <div class="form-floating">
          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required />
          <label for="floatingPassword">Password</label>
        </div>
        <div class="mb-3">
          <a href="register.php"><label>Create Account</label></a>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <?php
          // Conexiones
          if(isset($_GET['c'])){
            if ($_GET['c'] == 1){
              echo "<div class='text-success mt-2'> Usuario Registrado</div>";
            }
          }
          // Errores
          if(isset($_GET['e'])){
            if($_GET['e'] == 1){
              echo "<div class='text-danger mt-2'> Usuario no valido </div>";
            }else if ($_GET['e'] == 2){
              echo "<div class='text-danger mt-2'> Usuario no accesible </div>";
            }else if ($_GET['e'] == 3){
              echo "<div class='text-danger mt-2'> Error en el CRUD de proyectos [post->tipo]</div>";
            }else if ($_GET['e'] == 4){
              echo "<div class='text-danger mt-2'> Error en el Registro</div>";
            }
          }
        ?>
      </form>
    </main>
  </body>
</html>
