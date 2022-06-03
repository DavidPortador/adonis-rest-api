<?php
    session_start();
	if(isset($_POST['email']) and isset($_POST['password'])){
        $url = "http://tareasadonis.herokuapp.com/api/v1/usuarios/login";
        // Los datos de formulario
        $datos = [
            "email" => $_POST['email'],
            "password" => $_POST['password'],
        ];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos), // Agregar el contenido definido antes
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
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['type'] = $datos->{'type'};
            $_SESSION['token'] = $datos->{'token'};
            //var_dump($datos);
            header('location: ../user.php'); // Exitosa
        }
    }else{
        header('location: ../index.php?e=1'); // Fallida 1
    }
?>