<?php
include_once ('../model.class/Propiedad.php');
include_once ('../model.dal/PropiedadDal.php');
include_once ('../conexion.php') ;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try 
        {
            //Subir imagen al servidor
            $rutaServer = '../images';
            $rutaTemp = $_FILES['imagen']['tmp_name'];
            $nombreIma = $_FILES['imagen']['name'];
            $rutaDestino = $rutaServer . "/" . $nombreIma;
            move_uploaded_file($rutaTemp, $rutaDestino);
            //Instanciamos las clases
            $propiedadDal = new PropiedadDal();
            $p = new Propiedad();
            //Capturamos los datos del JSP
            $p->setCodigoPropiedad($_POST['txt_codigo']);
            $p->setFoto($nombreIma);
            $p->setPrecioUF($_POST['txt_precio_uf']);
            $p->setMetrosConstruidos($_POST['txt_metros_construidos']);
            $p->setMetrosTotal($_POST['txt_metros_total']);
            $p->setNumeroDormitorios($_POST['sp_dormitorios']);
            $p->setNumeroBanios($_POST['sp_banios']);
            $p->setTipoPropiedad($_POST['dll_tipo_propiedad']);
            $p->setComuna($_POST['dll_comunas']);
            $p->setDescripcion($_POST['txt_descripcion']);
            //Preguntamos si la inserción es = a 1 creé dicho propiedad
            if ($propiedadDal->insertProp($p))
            {           
                header('Location: ../Intranet/propiedad_creada.php');             
            }
            else
            {
               echo("ingreso Bad"); 
            }
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
