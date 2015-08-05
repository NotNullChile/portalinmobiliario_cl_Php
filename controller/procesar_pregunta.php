<?php
include('../conexion.php');
include('../model.class/Preguntas.php');
include('../model.dal/PreguntaDal.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try 
        {
            //Inicializamos la conexion a la DB
            $preguntaDal = new PreguntaDal();
            $preguntas = new Preguntas();
            //Capturamos los valores de la pagina
            $preguntas->setNombreCliente($_POST['txt_nombre']);
            $preguntas->setEmail($_POST['txt_email']);
            $preguntas->setTelefonoContacto($_POST['txt_phone']);
            $preguntas->setPregunta($_POST['txt_pregunta']);    
            //Nos Conectamos a la BD             
                if ($preguntaDal->insertPregunta($preguntas)) 
                {
                    //Redirige a la pagina
                    $preguntaDal->enviarMail($preguntas);
                    header('Location: ../mensaje_enviado.php');
                }
                else
                {
                    //Redirige pagina error
                    echo '("Error")';
                }  
        }      
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
                
        ?>
    </body>
</html>
