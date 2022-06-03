<?php
    session_start();
    if(isset($_POST['nombre'])){
        $url = "http://tareasadonis.herokuapp.com/api/v1/proyectos/";
        // Los datos de formulario
        $datos = [
            "nombre" => $_POST['nombre'],
        ];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n".
                            "Authorization: ".$_SESSION['type']." ".$_SESSION['token']."\r\n",
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
            header('location: ../proyecto.php?c=1'); // Exitosa
        }
    }else{
        header('location: ../index.php?e=3'); // Fallida 3
    }
?>