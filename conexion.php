<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author Ricardo
 */

//Conexion via local
//$conexion = mysql_connect('localhost','root','root') or die ('Error en conexión');
//$db = mysql_select_db('portalInmobiliario',$conexion) or die("No existe");
//mysql_set_charset('utf8');
$mysql_host = "mysql3.000webhost.com";
$mysql_database = "a4376984_portalI";
$mysql_user = "a4376984_notnull";
$mysql_password = "portal01";
$conexion = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die ('Error en conexion');
$db = mysql_select_db($mysql_database,$conexion) or die("No existe");
mysql_set_charset('utf8');

