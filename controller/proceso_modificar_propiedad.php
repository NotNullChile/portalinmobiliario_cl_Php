<?php
include_once ('../conexion.php');
include_once ('../model.dal/PropiedadDal.php');
include_once ('../model.class/Propiedad.php');
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
            //Instanciamos las Clases
            $propiedadDal = new PropiedadDal();
            $p = new Propiedad();
            //p = (Propiedad)request.getSession().getAttribute("propiedad");
            $p->setCodigoPropiedad($_POST['txt_codigo_prop']);
            $p->setTipoPropiedad($_POST['ddl_tipo_propiedad']);
            $p->setPrecioUF($_POST['spn_precio_uf']);
            $p->setMetrosTotal($_POST['spn_metros_total']);
            $p->setMetrosConstruidos($_POST['spn_metros_construidos']);
            $p->setNumeroDormitorios($_POST['spn_dormitorios']);
            $p->setNumeroBanios($_POST['spn_banios']);
            $p->setComuna($_POST['ddl_comunas']);
            $p->setDescripcion($_POST['txt_descripcion']);

            if (isset($_POST['btn_guardar']) && $propiedadDal->updateProp($p)  ) 
            {
                //Notificación de ingreso correcto.
                header('Location: ../Intranet/propiedad_modificada.php'); 
                 
            }
            //Si eso no ocurre pregunta si el Button(delete)es presionado borrará el objeto Propiedad
            else if(isset($_POST['btn_eliminar_propiedad']) &&  $propiedadDal->deleteProp($p))
            {    
                //Poner pagina de buen delete
                header('Location: ../Intranet/propiedad_borrada.php'); 
            }
            else
            {
                echo("error");
            }
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
