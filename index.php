<!DOCTYPE html>

<?php
include('model.dal/PropiedadDal.php');
//mysql_set_charset('utf8');
header('Content-Type: text/html; charset=UTF-8'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <head>
        <title>Portal Inmobiliario Chile</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Bootstrap-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!--Font Awesome-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!--Google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/pi.png">
    </head>
    <body>
        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            h1 {
                font-family: Lobster, Monospace;
            }
            .logotexto {
                font-family: Lobster, Monospace;
            }
            h3 {
                font-family: Raleway, Monospace;
            }
            body {
                background-image: url(images/bg4.jpg);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #464646;
                margin-bottom: 60px;
            } 
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                background-color: #000000;
            }
        </style>
        <!--Bootstrap Navigation Bar-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand " href="index.php">
                        <div class="logotexto">
                            PortalInmobili<i class="fa fa-home"/></i>rio.cl
                        </div>
                    </a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="propiedades.php">
                                <i class="fa fa-building"></i>
                                &nbsp; Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="contacto.php">
                                <i class="fa fa-comments"></i>
                                &nbsp; Contacto
                            </a>
                        </li> 
                        <li>
                            <a href="Ingreso_intranet.php">
                                <i class="fa fa-lock"></i>
                                &nbsp; Intranet
                            </a>
                        </li> 
                        <li>
                            <a href="about.php">
                                <i class="fa fa-code"></i>
                                    &nbsp; by not-null.cl
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
        <!--End of Bootstrap Navigation Bar-->
        
        <!--Bootstrap default jumbotron-->
         
        <div class="container">
                
            <div class="jumbotron">
                <h1 class='text-primary'>PortalInmobili<i class="fa fa-home"/></i>rio.cl
                </h1>
                <h3>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ...la direcci<i class="fa fa-compass"></i>n de tu nuevo hogar.
                </h3>              
                <a href="propiedades.php" type='button' class='btn btn-success btn-lg btn-block'>
                    Busca casas y departamentos por comuna &nbsp;&nbsp;&nbsp; 
                    <i class="fa fa-search"></i>                   
                </a>                  
            </div>         
        </div>
     
        <!--En of Boostrap default jumbotron-->
        
        <!--Main page-->
        
        <div class="col-sm-1"></div>
        
        <div class="well col-sm-10">
            <br>
            <!--Pre-table header-->
            <h4>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">Últimas propiedades en nuestro portal:</div>
                    <div class="col-sm-3">
                        <a href="propiedades.php" type="button" class="btn btn-block btn-danger">
                            <span class="badge">
                                <?php
                                    $propiedadDal = new PropiedadDal();
                                    //Poner count
                                    echo $propiedadDal->countProp();
                                    
                                    
                                ?>
                            </span> 
                            &nbsp;&nbsp;nuevas en la última semana.
                        </a>
                    </div>
                </div>
            </h4>
            <!--End of Pre-table header-->
            <br>
            <!--Main Table.-->
            <table class="table table-hover" >
                <thead>
                    <tr class="bg-primary row">
                        <td class="col-sm-3"><i class="fa fa-photo"></i></td>
                        <td class="col-sm-1"><i class="fa fa-map-marker"></i></td>
                        <td class="col-sm-1"><i class="fa fa-usd"></i>&nbsp;Precio</td>
                        <td class="col-sm-2"><i class="fa fa-th"></i>&nbsp;Dimensiones</td>
                        <td class="col-sm-2"><i class="fa fa-users"></i>&nbsp;Habitaciones</td>
                        <td class="col-sm-3"><i class="fa fa-newspaper-o"></i>&nbsp;Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    <?php    
                    //Tabla de propiedades
                        echo $propiedadDal->listPropiedadIndex();
                    ?>     
                    <tr><td>&nbsp;</td></tr>
                </tbody>
            </table>
            <!--End of Main table-->
        
        <!--Main Page end.-->
        </div>
        <footer class="footer">
            <div class="container">
                <!--Creative Commons License-->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 text-left">
                        <h6>
                            <small>
                                <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
                                <img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" />
                                </a><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">portalinmobiliario_notNull</span> por 
                                <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.notnull.cl" property="cc:attributionName" rel="cc:attributionURL">
                                notNull Chile</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"> Licencia Creative
                                    Commons Atribución-NoComercial-SinDerivar 4.0 Internacional</a>.<br /> Basada en una obra en 
                                <a xmlns:dct="http://purl.org/dc/terms/" href="https://github.com/NotNullChile/portalinmobiliario_cl" rel="dct:source">
                                https://github.com/NotNullChile/portalinmobiliario_cl</a>.
                            </small>
                        </h6>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <!--End of creative Commons License-->
            </div>
        </footer>
    </body>
</html>