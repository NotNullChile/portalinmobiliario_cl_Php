<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Preguntas
 *
 * @author Ricardo
 */
class Preguntas 
{
    private $nombreCliente;
    private $pregunta;
    private $email;
    private $telefonoContacto;
    
    function __construct() 
    {
        $nombreCliente = "nada";
        $pregunta = "nada";
        $email = "nada";
        $telefonoContacto = 0;
    }
    function getNombreCliente() {
        return $this->nombreCliente;
    }

    function getPregunta() {
        return $this->pregunta;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    function setNombreCliente($nombreCliente) {
        $this->nombreCliente = $nombreCliente;
    }

    function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }


}
