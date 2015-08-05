<?php
include('../conexion.php');
include('../model.class/Ejecutivo.php');
include('../model.dal/EjecutivoDal.php');
session_start();
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
            //Instancia de la clase
            $ejecutivo    = new Ejecutivo();
            $ejecutivoDal = new EjecutivoDal();         
            //Se captura los datos del JSP
            $ejecutivo->setAlias($_POST['txt_username']);
            $ejecutivo->setClave($_POST['txt_password']);           
            $ejecutivo = $ejecutivoDal->validarAcceso($ejecutivo);
            // Si todo esta correcto creará la session ejecutivo, sino redirige a una pagina de error.
            
            if ($ejecutivo->getNombreEjecutivo() != "")             
            {   
                $arrayEjecutivo = array('alias' => $ejecutivo->getAlias(), 'clave' =>$ejecutivo->getClave(),
                                        'nombreEjecutivo' => $ejecutivo->getNombreEjecutivo());
                
                $_SESSION['ejecutivo'] = $arrayEjecutivo;
                header('Location: ../Intranet/intranet.php');
            }
            else
            {   
                header('Location: ../Intranet/error_user.php');
            }  
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
