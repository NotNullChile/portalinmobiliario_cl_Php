<?php
//include('../conexion.php');
//mysql_set_charset('utf8');

class PropiedadDal 
{
    
    function __construct() 
    {
    }

    function  listPropiedadIndex()
    {
        include('conexion.php');
        try 
        {
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c ON p.idComuna = c.idComuna;";
            $query = mysql_query($sql);
            //Arroja el error
            if($query === FALSE) 
            { 
                die(mysql_error()); // TODO: better error handling
            }
            while($row = mysql_fetch_array($query))
            {
                $id              = $row['idPropiedad'];
                $foto            = $row['foto'];
                $precioUF        = $row['precioUf'];
                $mtsCons         = $row['mtsConstruido'];
                $mtsTotal        = $row['mtsTotal'];
                $numDorm         = $row['numeroCormitorios'];
                $numBanos        = $row['numeroBaños'];
                $tProp           = $row['tipoPropiedad'];
                $nombreC         = $row['nombreComuna'];
                $desc            = $row['descripcion'];

                echo('<tr class=row>');
                    echo ('<td><img src=images/' . $foto . ' class="img-thumbnail"></td>');
                    if ($tProp == ("casa")) 
                    {
                        echo('<td><i class="fa fa-home"></i></td>');
                    }
                    else if ($tProp == ("departamento"))
                    {
                        echo('<td><i class="fa fa-building"></i></td>');
                    }            
                    echo('<br> <td>' . $nombreC . '</td>' );              
                    echo('<td><i class="fa fa-usd"></i>&nbsp;UF: ' . $precioUF );
                    echo('<br><br><i class="fa fa-money"></i>&nbsp;Pesos: ' . $precioUF . '</td>'); 
                    echo('<td><i class="fa fa-square-o"></i>&nbsp;Metros totales: <br>' . $mtsTotal . " " );
                    echo('<br><br><i class="fa fa-th"></i>&nbsp;Metros construidos: <br>' . $mtsCons . '</td>');
                    echo('<td><i class="fa fa-bed"></i>&nbsp;Dormitorios: ' . $numDorm);
                    echo('<br><br><i class="fa fa-tint"></i>&nbsp;Baños: ' . $numBanos . '</td>' );
                    echo('<td>' . $desc . '</td>' );
                echo('</tr>');              
            }  
        } 
        catch (Exception $exc) 
        {
            echo $exc->getMessage();
        }
    }
    
    function  listPropiedadPropiedades()
    {
        include('conexion.php');
        try 
        {
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c on p.idComuna = c.idComuna;";
            $query = mysql_query($sql);
            //Arroja el error
            if($query === FALSE) 
            { 
                die(mysql_error()); // TODO: better error handling
            }
            while($row = mysql_fetch_array($query))
            {
                $id              = $row['idPropiedad'];
                $foto            = $row['foto'];
                $precioUF        = $row['precioUf'];
                $mtsCons         = $row['mtsConstruido'];
                $mtsTotal        = $row['mtsTotal'];
                $numDorm         = $row['numeroCormitorios'];
                $numBanos        = $row['numeroBaños'];
                $tProp           = $row['tipoPropiedad'];
                $nombreC         = $row['nombreComuna'];
                $desc            = $row['descripcion'];
                echo('<tr>');
                        echo('<td><img src=images/' . $foto . ' class="img-thumbnail"></td>');
                        echo('<td>' . $tProp .'</td>');
                        echo('<td>'. $precioUF .'</td>');
                        echo('<td>'. $precioUF .'</td>');
                        echo('<td>'. $nombreC .'</td>');
                        echo('<td>'. $mtsTotal .'</td>');
                        echo('<td>'. $mtsCons .'</td>');
                        echo('<td>' . $numDorm .'</td>');
                        echo('<td>' . $numBanos .'</td>');                      
                        echo('<td>' . $desc .'</td>');  
                echo('</tr>');
            }  
        } 
        catch (Exception $exc) 
        {
            echo $exc->getMessage();
        }
    }
    
    function  listPropiedadPropiedadesComuna($comuna)
    {
        include('conexion.php');
        try 
        {
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c on p.idComuna = c.idComuna "
                 . "WHERE c.idComuna = " . $comuna . ";";
            $query = mysql_query($sql);
            //Arroja el error
            if($query === FALSE) 
            { 
                die(mysql_error()); // TODO: better error handling
            }
            while($row = mysql_fetch_array($query))
            {
                $id              = $row['idPropiedad'];
                $foto            = $row['foto'];
                $precioUF        = $row['precioUf'];
                $mtsCons         = $row['mtsConstruido'];
                $mtsTotal        = $row['mtsTotal'];
                $numDorm         = $row['numeroCormitorios'];
                $numBanos        = $row['numeroBaños'];
                $tProp           = $row['tipoPropiedad'];
                $nombreC         = $row['nombreComuna'];
                $desc            = $row['descripcion'];
                echo('<tr>');
                        echo('<td><img src=images/' . $foto . ' class="img-thumbnail"></td>');
                        echo('<td>' . $tProp .'</td>');
                        echo('<td>'. $precioUF .'</td>');
                        echo('<td>'. $precioUF .'</td>');
                        echo('<td>'. $nombreC .'</td>');
                        echo('<td>'. $mtsTotal .'</td>');
                        echo('<td>'. $mtsCons .'</td>');
                        echo('<td>' . $numDorm .'</td>');
                        echo('<td>' . $numBanos .'</td>');                      
                        echo('<td>' . $desc .'</td>');  
                echo('</tr>');
            }  
        } 
        catch (Exception $exc) 
        {
            echo $exc->getMessage();
        }
    }
    function countProp()
    {
        include('conexion.php');
        $sql = "SELECT count(idPropiedad) as 'Suma' FROM propiedad;";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query))
        {
            $count = $row['Suma'];
            echo $count;
        }
    }
    function buscarPropiedad($idProp)
    {
        include('../conexion.php');
        require_once ('../model.class/Propiedad.php');
        try
        {
           $propiedad = new Propiedad();
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c on p.idComuna = c.idComuna "
                 . "WHERE p.idPropiedad = " . $idProp . ";";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query))
            {
                $propiedad->setCodigoPropiedad($row['idPropiedad']);
                $propiedad->setFoto($row['foto']);
                $propiedad->setPrecioUF($row['precioUf']);
                $propiedad->setMetrosConstruidos($row['mtsConstruido']);
                $propiedad->setMetrosTotal($row['mtsTotal']);
                $propiedad->setNumeroDormitorios($row['numeroCormitorios']);
                $propiedad->setNumeroBanios($row['numeroBaños']);
                $propiedad->setTipoPropiedad($row['tipoPropiedad']);
                $propiedad->setComuna($row['nombreComuna']);
                $propiedad->setDescripcion($row['descripcion']);
            }
            return $propiedad; 
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    
    function maxProp()
    {
        include('../conexion.php');
        try 
        {
            $sql = "SELECT max(idPropiedad) as 'max' FROM propiedad;";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query)) 
            {
                return $row['max'];
            }
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    function minProp()
    {
        include('../conexion.php');
        try 
        {
            $sql = "SELECT min(idPropiedad) as 'min' FROM propiedad;";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query)) 
            {
                return $row['min'];
            }
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    function listarPropIntranet()
    {
        include('../conexion.php');
        try 
        {
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c on p.idComuna = c.idComuna;";
            $query = mysql_query($sql);
            //Arroja el error
            if($query === FALSE) 
            { 
                die(mysql_error()); // TODO: better error handling
            }
            while($row = mysql_fetch_array($query))
            {
                $id              = $row['idPropiedad'];
                $foto            = $row['foto'];
                $precioUF        = $row['precioUf'];
                $mtsCons         = $row['mtsConstruido'];
                $mtsTotal        = $row['mtsTotal'];
                $numDorm         = $row['numeroCormitorios'];
                $numBanos        = $row['numeroBaños'];
                $tProp           = $row['tipoPropiedad'];
                $nombreC         = $row['nombreComuna'];
                $desc            = $row['descripcion'];
                echo('<tr class="row">');
                    echo('<td class="col-sm-1">' . $id .'</td>');
                    echo('<td class="col-sm-1"><img src=../images/' . $foto . ' class="img-thumbnail"></td>');
                    echo('<td class="col-sm-1">' . $tProp .'</td>');
                    echo('<td class="col-sm-1">'. $precioUF .'</td>');
                    echo('<td class="col-sm-1">'. $nombreC .'</td>');
                    echo('<td class="col-sm-1">'. $mtsTotal .'</td>');
                    echo('<td class="col-sm-1">'. $mtsCons .'</td>');
                    echo('<td class="col-sm-1">' . $numDorm .'</td>');
                    echo('<td class="col-sm-1">' . $numBanos .'</td>');                     
                    echo('<td class="col-sm-3">' . $desc .'</td');  
                echo('</tr>');
            }  
        } 
        catch (Exception $exc) 
        {
            echo $exc->getMessage();
        } 
    }
    function insertProp(Propiedad $p)
    {
        include_once ('../conexion.php');
        include_once ('../model.class/Propiedad.php');
        try 
        {
            $insert = "INSERT INTO propiedad VALUES('" . $p->getCodigoPropiedad() . "', "
                    . "'" . $p->getFoto() . "'," . $p->getPrecioUF() . ", "
                    . "" . $p->getMetrosConstruidos() . "," . $p->getMetrosTotal() . ", "
                    . "" . $p->getNumeroDormitorios() . "," . $p->getNumeroBanios() . ", "
                    . "'" . $p->getTipoPropiedad() . "','" . $p->getComuna() . "','" . $p->getDescripcion() . "');";
            $query = mysql_query($insert);
            
            return $query;
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    
    function buscarPropiedadModificarProp($idProp)
    {
        include ('../conexion.php');
        try
        {         
            $sql = "SELECT p.idPropiedad, p.foto, p.precioUf, p.mtsConstruido, "
                 . "p.mtsTotal, p.numeroCormitorios, p.numeroBaños, p.tipoPropiedad, "
                 . "c.nombreComuna, p.descripcion "
                 . "FROM propiedad p INNER JOIN comuna c on p.idComuna = c.idComuna "
                 . "WHERE p.idPropiedad = " . $idProp . ";";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query))
            {
                $id              = $row['idPropiedad'];
                $foto            = $row['foto'];
                $precioUF        = $row['precioUf'];
                $mtsCons         = $row['mtsConstruido'];
                $mtsTotal        = $row['mtsTotal'];
                $numDorm         = $row['numeroCormitorios'];
                $numBanos        = $row['numeroBaños'];
                $tProp           = $row['tipoPropiedad'];
                $nombreC         = $row['nombreComuna'];
                $desc            = $row['descripcion'];
                
            }
            return array('id'=>$id,'foto'=>$foto,'precioUF'=>$precioUF,
                             'mtsCons'=>$mtsCons,'mtsTotal'=>$mtsTotal,'numDorm'=>$numDorm,
                             'numBanos'=>$numBanos,'tProp'=>$tProp,'nombreC'=>$nombreC,'desc'=>$desc);
        } 
        catch (Exception $exc) 
        {
            
        }
    }
    function updateProp(Propiedad $p)
    {
        include_once('../conexion.php');
        try 
        {
             $sql = "UPDATE propiedad "
                   ."SET precioUf = " . $p->getPrecioUF() . ", " 
                   ."mtsConstruido = " . $p->getMetrosConstruidos() . ", "
                   ."mtsTotal = " . $p->getMetrosTotal() . ", "
                   ."numeroCormitorios = ". $p->getNumeroDormitorios() . ", "
                   ."numeroBaños = " . $p->getNumeroBanios() . ", "
                   ."tipopropiedad = '". $p->getTipoPropiedad() . "', "
                   ."idComuna = '" . $p->getComuna() . "', "
                   ."descripcion = '". $p->getDescripcion() . "' "
                   ."WHERE idPropiedad = " . $p->getCodigoPropiedad() . " ; ";
             $query = mysql_query($sql);
             return $query;
        }
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    function deleteProp(Propiedad $p)
    {
        include_once('../conexion.php');
        try 
        {
             $sql = "DELETE FROM propiedad WHERE idPropiedad = ". $p->getCodigoPropiedad() .";";
             $query = mysql_query($sql);
             return $query;
        }
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
}
