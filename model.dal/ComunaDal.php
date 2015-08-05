<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaDal
 *
 * @author Ricardo
 */
class ComunaDal 
{
    
    function listComuna()
    {
        include('conexion.php');
        $sql = "SELECT * FROM comuna ORDER BY 2";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query))
        {
            $idComuna = $row['idComuna'];
            $nombreComuna = $row['nombreComuna'];
            echo '<option value = "' . $idComuna . '">' . $nombreComuna . '</option>';
        }
    }
    function listComunaIntranet()
    {
        include('../conexion.php');
        $sql = "SELECT * FROM comuna ORDER BY 2";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query))
        {
            $idComuna = $row['idComuna'];
            $nombreComuna = $row['nombreComuna'];
            echo '<option value = "' . $idComuna . '">' . $nombreComuna . '</option>';
        }
    }

}
