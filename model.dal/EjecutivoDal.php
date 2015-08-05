<?php
include('conexion.php');
include('model.dal/Ejecutivo.php');
mysql_set_charset('utf8');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EjecutivoDal
 *
 * @author Ricardo
 */
class EjecutivoDal 
{
    function validarAcceso(Ejecutivo $e)
    {
        try 
        {
           $ejecutivo = new Ejecutivo();
            $sql = "SELECT alias, clave, nombreEjecutivo "
                 . "FROM ejecutivo "
                 . "WHERE alias = '" . $e->getAlias() . "' AND clave = '" . $e->getClave() . "';";
            $query = mysql_query($sql);
            while($row = mysql_fetch_array($query))
            {
                $ejecutivo->setAlias($row['alias']);
                $ejecutivo->setClave($row['clave']);
                $ejecutivo->setNombreEjecutivo($row['nombreEjecutivo']);
            } 
            return $ejecutivo;
        }       
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
}
