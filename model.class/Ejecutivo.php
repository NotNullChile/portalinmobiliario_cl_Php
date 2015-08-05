<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ejecutivo
 *
 * @author Ricardo
 */
class Ejecutivo 
{
    private $alias;
    private $clave;
    private $nombreEjecutivo;
    
    function __construct() 
    {
        
    }
    
    function getAlias() {
        return $this->alias;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombreEjecutivo() {
        return $this->nombreEjecutivo;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNombreEjecutivo($nombreEjecutivo) {
        $this->nombreEjecutivo = $nombreEjecutivo;
    }



}
