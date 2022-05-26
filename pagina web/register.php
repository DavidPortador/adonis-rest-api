<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Register</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form method="post" action="class/registro.php">
        <img class="mb-2" src="https://icons-for-free.com/download-icon-adonisjs-1324440116642911008_512.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <div class="form-floating">
          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
          <input name="cpassword" type="password" class="form-control" id="floatingPasswordc" placeholder="Password">
          <label for="floatingPasswordc">Confirm Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-info mt-3" type="submit">Register</button>
        <div class="mt-3">
          <a href="index.php"><label>Login</label></a>
        </div>
      </form>
    </main>
  </body>
</html>
