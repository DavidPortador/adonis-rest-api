<?php
    session_start();
    if(isset($_POST['descripcion']) and isset($_POST['completada'])){
        $url = "http://tareasadonis.herokuapp.com/api/v1/tareas/".$_POST['id'];
        // Los datos de formulario
        $datos = [
            "descripcion" => $_POST['descripcion'],
            "completada" => $_POST['completada'],
        ];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n".
                            "Authorization: ".$_SESSION['type']." ".$_SESSION['token']."\r\n",
                "method" => "PATCH",
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
            header('location: ../tarea.php?c=2'); // Exitosa
        }
    }else{
        header('location: ../index.php?e=30'); // Fallida 3
    }
?>