<?php

include('../conexion.php');
include ('../model.dal/PropiedadDal.php');
require_once('../model.class/Propiedad.php');
mysql_set_charset('utf8');
header('Content-Type: text/html; charset=UTF-8');
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
            //Busca una propiedad en la base de datos con el código ingresado. 
            $propiedad = new Propiedad();
            $propiedadDal = new PropiedadDal();
            $codigoPropiedad = $_POST['txt_codigo'];
            //Crea una propiedad basada en el retorno de la base de datos.
            $propiedad = $propiedadDal->buscarPropiedad($codigoPropiedad);          
            if ($propiedad->getCodigoPropiedad() >= $propiedadDal->minProp() && $propiedad->getCodigoPropiedad() <= $propiedadDal->maxProp() ) 
            {
                //Si se recibe una propiedad válida, se crea el atributo de sesión
                $arrayProp = array('idPropiedad' => $propiedad->getCodigoPropiedad(), 'foto' => $propiedad->getFoto(),
                                   'precioUf' => $propiedad->getPrecioUF(), 'mtsConstruido' => $propiedad->getMetrosConstruidos(),
                                   'mtsTotal' => $propiedad->getMetrosTotal(), 'numeroDormitorios' => $propiedad->getNumeroDormitorios(),
                                   'numeroBaños' => $propiedad->getNumeroBanios(), 'tipoPropiedad' => $propiedad->getTipoPropiedad(),
                                   'nombreComuna' => $propiedad->getComuna(), 'descripcion' => $propiedad->getDescripcion());
                $_SESSION['prop'] = $arrayProp;
                //...y se muestra la propiedad encontrada.
                header('Location: ../Intranet/mostrar_propiedad.php');
            }
            else
            {
                //Si no se recibe una propiedad válida, se muestra un php de error.
                header('Location: ../Intranet/error_propiedad.php');
            }
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
