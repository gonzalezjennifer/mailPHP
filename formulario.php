<?php
    //isset -> Determina si una variable esta definida y no es null
    //empty -> Determina si una variable esta vacia
    //trim -> elimina espacion en blanco de un string
    if($_POST){
        // inicializamos variables
        $usuario = "";
        $correo = "";
        $mensaje = "";

        if(isset($_POST['usuario'])) {
            $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
        }
        if(isset($_POST['correo'])) {
            $correo = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
        }
        if(isset($_POST['mensaje'])) {
            $mensaje = filter_var(trim($_POST['mensaje']), FILTER_SANITIZE_STRING);   
        }

        if(empty($usuario)){
            echo json_encode(array(
                'error' => true,
                'campo' => 'usuario'
            ));
            return;
        }
        if(empty($correo)){
            echo json_encode(array(
                'error' => true,
                'campo' => 'correo'
            ));
            return;
        }
        if(empty($mensaje)){
            echo json_encode(array(
                'error' => true,
                'campo' => 'mensaje'
            ));
            return;
        }

        // Iniciamos con la creacion del correo
        $cuerpo = 'Usuario: ' . $usuario . "<br>";
        $cuerpo = 'Correo: ' . $correo . "<br>";
        $cuerpo = 'Mensaje: ' . $mensaje . "<br>";

        // a quien se va a mandar
        $destinatario = 'jeennyyfeerr@gmail.com';
        $asunto = 'Correo de Practica con PHP';

        // configurar para que se vea con HTML
        $headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=utf-8' . "\r\n" . 'From: ' . $correo . "\r\n" ;

        if(mail($destinatario, $asunto, $cuerpo, $headers)) {
            echo json_encode(array(
                'error' => false,
                'campo' => 'exito'
            ));
        } else {
            echo json_encode(array(
                'error' => true,
                'campo' => 'mail'
            ));
            return;
        }

    }
?>