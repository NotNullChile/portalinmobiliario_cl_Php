<!--sessions and attributes-->
<?php
session_start();
//Comprobará si la session existe y se ejecutará toda la pagina
if(isset($_SESSION['ejecutivo']) && isset($_SESSION['prop']))
{
    $sessionEjecutivo = $_SESSION['ejecutivo'];
    $sessionProp = $_SESSION['prop'];
?>
<html>
    <head>
        <title>Intranet</title>
        <meta charset="UTF-8">
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
        <link rel="icon" type="image/png" href="../images/pi.png">
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
                background-image: url(../images/bg1.jpg);
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
                    <a class="navbar-brand " href="intranet.php">
                        <div class="logotexto">
                            PortalInmobili<i class="fa fa-home"/></i>rio.cl
                        </div>
                    </a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="intranet.php">
                                <i class="fa fa-unlock"></i>
                                &nbsp; Home Intranet
                            </a>
                        </li>
                        <li class="active">
                            <a href="buscar_propiedad.php">
                                <i class="fa fa-cogs"></i>
                                &nbsp; Administrar Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="preguntas.php">
                                <i class="fa fa-inbox"></i>
                                &nbsp; Responder Preguntas
                            </a>
                        </li>  
                        <li>
                            <a href="../controller/cerrar_session.php">
                                <i class="fa fa-lock"></i>
                                &nbsp; Logout
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
        <!--body-->
        <div class="col-sm-1"></div>
        <div class="well col-sm-10">
            <h1><i class="fa fa-spin fa-cog"></i>&nbsp;Resultado de la búsqueda:</h1>
            <h3>&nbsp;</h3>
            <div  class="row">
            <!--side menu-->
                <div class="list-group col-sm-2">
                    <a href="buscar_propiedad.php" class="list-group-item active"><i class="fa fa-search"></i>&nbsp;Buscar propiedades</a>
                    <a href="listar_propiedades.php" class="list-group-item"><i class="fa fa-list-ol"></i>&nbsp;Listar propiedades</a>
                    <a href="agregar_propiedad.php" class="list-group-item"><i class="fa fa-plus-circle"></i>&nbsp;Agregar propiedades</a>
                    <a href="preguntas.php" class="list-group-item"><i class="fa fa-inbox"></i>&nbsp;Responder preguntas</a>
                </div>
                <!--búsqueda-->
                <div class="col-sm-8">
                    <form action="modificar_propiedad.php" method="POST">
                    <div class="form-group">
                        <table class="table table-hover" >
                        <tbody>
                            <tr>
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle"></i>
                                    &nbsp;&nbsp;
                                    <strong>Propiedad encontrada.</strong> Puede modificar o eliminar esta propiedad con los siguientes botones:
                                </div>
                            </tr>
                            <tr>
                                <td>
                                    <button name="btn_modificar_propiedad" class="btn btn-warning">
                                        <i class="fa fa-wrench"></i>
                                        Modificar esta propiedad
                                    </button>
                                </td>  
                                <td>
                                    <form name="delete" action="../controller/proceso_modificar_propiedad.php" method="POST">                                    
                                    <button name="btn_eliminar_propiedad" class="btn btn-danger">                                                                                               
                                        <i class="fa fa-trash"></i>                                       
                                         Eliminar esta propiedad
                                    </button>
                                    <input type="hidden" name="txt_codigo_prop" value="<?php echo $sessionProp['idPropiedad']?>" />
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-photo"></i>
                                    &nbsp;&nbsp;
                                    Fotografía:
                                </td>
                                <td>
                                    <img src="../images/<?php echo $sessionProp['foto']?>" class="img-thumbnail">
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-5">
                                    <i class="fa fa-list-ol"></i>
                                    &nbsp;&nbsp;
                                    Código de propiedad:
                                </td>
                                <td>
                                    <input type="hidden" name="txt_id" value="<?php echo $sessionProp['idPropiedad']?>" />
                                    <?php echo $sessionProp['idPropiedad']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">
                                    <i class="fa fa-home"></i>
                                    <i class="fa fa-building"></i>
                                    Tipo de propiedad:
                                </td>
                                <td>
                                    <?php echo $sessionProp['tipoPropiedad']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-usd"></i>
                                    &nbsp;&nbsp;
                                    Precio (UF)
                                </td>
                                <td>
                                    <?php echo $sessionProp['precioUf']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-money"></i>
                                    &nbsp;&nbsp;
                                    Precio en Pesos
                                </td>
                                <td>
                                   <?php echo $sessionProp['precioUf']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-map-marker"></i>
                                    &nbsp;&nbsp;
                                    Comuna
                                </td>
                                <td> 
                                    <?php echo $sessionProp['nombreComuna']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-square-o"></i>
                                    &nbsp;&nbsp;
                                    Metros Totales
                                </td>
                                <td>
                                    <?php echo $sessionProp['mtsTotal']?>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-th"></i>
                                    &nbsp;&nbsp;
                                    Metros Construidos</td>
                                <td>
                                    <?php echo $sessionProp['mtsConstruido']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-bed"></i>
                                    &nbsp;&nbsp;
                                    Número de Dormitorios
                                </td>
                                <td>
                                    <?php echo $sessionProp['numeroDormitorios']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-tint"></i>
                                    &nbsp;&nbsp;
                                    Número de Baños
                                </td>
                                <td>
                                    <?php echo $sessionProp['numeroBaños']?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-newspaper-o"></i>
                                    &nbsp;&nbsp;
                                    Descripción
                                </td>
                                <td>
                                   <?php echo $sessionProp['descripcion']?>
                                </td>  
                            </tr>                           
                            <tr>
                            </tr>
                            <tr>
                                <td>
                                    <button name="btn_modificar_propiedad" class="btn btn-warning">
                                        <i class="fa fa-wrench"></i>
                                        Modificar esta propiedad
                                    </button>
                                </td>  
                                <td>
                                    <form name="delete01" action="../controller/proceso_modificar_propiedad.php" method="POST">                                     
                                    <button name="btn_eliminar_propiedad" class="btn btn-danger">                                                                                               
                                        <i class="fa fa-trash"></i>                                       
                                         Eliminar esta propiedad
                                    
                                    </button>
                                    <input type="hidden" name="txt_codigo_prop" value="<?php echo $sessionProp['idPropiedad']?>" />
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                                <h3>&nbsp;</h3>
                        </div>
                    </form>
                </div><!--End of col-->
            </div><!--End of row-->     
        </div><!--End of well-->

                            
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
        <?php
            }
            else
            {
                header('Location: ../Ingreso_intranet.php');
            }
        ?>
    </body>
</html>
