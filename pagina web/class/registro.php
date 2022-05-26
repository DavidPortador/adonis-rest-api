<?php
    session_start();
	if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['cpassword'])){
        // Constraseñas iguales
        if($_POST['password'] == $_POST['cpassword']){
            $url = "http://127.0.0.1:3333/api/v1/usuarios/registro";
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
                header('location: ../index.php?e=4'); // Fallida 4
            }else{
                $datos = json_decode($resultado);
                //var_dump($datos);
                header('location: ../index.php?c=1'); // Exitosa
            }
        }else{
            header('location: ../index.php?e=4'); // Fallida 4
        }        
    }else{
        header('location: ../index.php?e=4'); // Fallida 4
    }
?>