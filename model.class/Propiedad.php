<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Propiedad
 *
 * @author Ricardo
 */
class Propiedad {
    private $codigoPropiedad;
    private $foto;
    private $tipoPropiedad;
    private $precioUF;
    private $comuna;
    private $metrosConstruidos;
    private $metrosTotal;
    private $descripcion;
    private $numeroDormitorios;
    private $numeroBanios;
    
    public function __construct() 
    {
    }
    
    function getCodigoPropiedad() {
        return $this->codigoPropiedad;
    }

    function getFoto() {
        return $this->foto;
    }

    function getTipoPropiedad() {
        return $this->tipoPropiedad;
    }

    function getPrecioUF() {
        return $this->precioUF;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getMetrosConstruidos() {
        return $this->metrosConstruidos;
    }

    function getMetrosTotal() {
        return $this->metrosTotal;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNumeroDormitorios() {
        return $this->numeroDormitorios;
    }

    function getNumeroBanios() {
        return $this->numeroBanios;
    }

    function setCodigoPropiedad($codigoPropiedad) {
        $this->codigoPropiedad = $codigoPropiedad;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setTipoPropiedad($tipoPropiedad) {
        $this->tipoPropiedad = $tipoPropiedad;
    }

    function setPrecioUF($precioUF) {
        $this->precioUF = $precioUF;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setMetrosConstruidos($metrosConstruidos) {
        $this->metrosConstruidos = $metrosConstruidos;
    }

    function setMetrosTotal($metrosTotal) {
        $this->metrosTotal = $metrosTotal;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNumeroDormitorios($numeroDormitorios) {
        $this->numeroDormitorios = $numeroDormitorios;
    }

    function setNumeroBanios($numeroBanios) {
        $this->numeroBanios = $numeroBanios;
    }


}
