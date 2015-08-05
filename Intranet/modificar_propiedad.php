<?php
include_once ('../conexion.php');
include ('../model.dal/ComunaDal.php');
include ('../model.dal/PropiedadDal.php');
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
            <h1><i class="fa fa-spin fa-cog"></i>&nbsp;Modificación de datos de propiedad:</h1>
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
                    <form action="../controller/proceso_modificar_propiedad.php" method="POST">
                        <div class="form-group">
                            <table class="table table-hover" >
                                    <tbody>
                                        <tr>
                                        <div class="alert alert-warning">
                                                <i class="fa fa-wrench"></i>
                                                &nbsp;&nbsp;
                                                <strong>Edición de propiedad:</strong> Modifique las catacterísticas de la propiedad seleccionada. <br>
                                                <i class="fa fa-warning"></i>
                                                &nbsp;&nbsp;
                                                <strong>Advertencia: </strong>Una vez guardados los cambios no se pueden revertir.
                                            </div>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button name="btn_guardar"
                                                    class="btn btn-warning">
                                                    <i class="fa fa-cloud"></i>
                                                    Guardar cambios
                                                </button>
                                            </td>  
                                            <td>
                                                <button name="btn_eliminar_propiedad" class="btn btn-danger">                                                                                               
                                                    <i class="fa fa-trash"></i>
                                                    Eliminar esta propiedad
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        $propDal = new PropiedadDal();
                                        $comunaDal = new ComunaDal();
                                        $id = $_POST['txt_id'];
                                        echo $idProp;
                                        $arrayProp = $propDal->buscarPropiedadModificarProp($id);
                                        ?>
                                        <tr>
                                            <td>
                                                <i class="fa fa-photo"></i>
                                                &nbsp;&nbsp;
                                                Fotografía:
                                            </td>
                                            <td>
                                                <img src="../images/<?php echo $arrayProp['foto']?>" class="img-thumbnail">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-5">
                                                <i class="fa fa-list-ol"></i>
                                                &nbsp;&nbsp;
                                                Código de propiedad:
                                            </td>
                                            <td>
                                                <input name="txt_codigo_prop" 
                                                       type="text" class="form-control col-sm-3" 
                                                       value="<?php echo $arrayProp['id']?>"
                                                       readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3">
                                                <i class="fa fa-home"></i>
                                                <i class="fa fa-building"></i>
                                                Tipo de propiedad:
                                            </td>
                                            <td>
                                                <select name = "ddl_tipo_propiedad" 
                                                        class="form-control"
                                                        >
                                                    <option value="<?php echo $arrayProp['tProp']?>" ><?php echo $arrayProp['tProp']?></option>
                                                    <?php
                                                        if ($arrayProp['tProp'] == ("casa")) 
                                                        {
                                                            echo("<option>Departamento</option>");
                                                        }
                                                        else
                                                        {
                                                            echo("<option>Casa</option>");
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-usd"></i>
                                                &nbsp;&nbsp;
                                                Precio (UF)
                                            </td>
                                            <td>
                                                <input class="form-control"
                                                       name="spn_precio_uf"
                                                       type="number"   
                                                       value="<?php echo $arrayProp['precioUF']?>"
                                                       >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-money"></i>
                                                &nbsp;&nbsp;
                                                Precio en Pesos
                                            </td>
                                            <td>
                                                <input type="text" class="form-control " 
                                                       placeholder=" <?php echo $arrayProp['precioUF']?> (El precio en pesos se actualizará automáticamente al guardar)" 
                                                       readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-map-marker"></i>
                                                &nbsp;&nbsp;
                                                Comuna
                                            </td>
                                            <td> 
                                                <select name = "ddl_comunas" 
                                                        class="form-control"
                                                        placeholder="<?php echo $arrayProp['nombreC']?>"
                                                        required>
                                                    </option>
                                                <?php echo $comunaDal->listComunaIntranet()?>        
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-square-o"></i>
                                                &nbsp;&nbsp;
                                                Metros Totales
                                            </td>
                                            <td><input class="form-control col-sm-2"
                                                       min = "1" max = "10000" 
                                                       name="spn_metros_total" 
                                                       step = "0.1"
                                                       type="number" 
                                                       value="<?php echo $arrayProp['mtsTotal']?>"
                                                       required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-th"></i>
                                                &nbsp;&nbsp;
                                                Metros Construidos</td>
                                            <td>
                                                <input name="spn_metros_construidos"
                                                       class="form-control"
                                                       min = "1" max = "10000"
                                                       step = "0.1" 
                                                       type="number"    
                                                       value="<?php echo $arrayProp['mtsCons']?>"
                                                       required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-bed"></i>
                                                &nbsp;&nbsp;
                                                Número de Dormitorios
                                            </td>
                                            <td>
                                                <input name="spn_dormitorios" 
                                                       class="form-control"  
                                                       min ="1" max ="10" 
                                                       step = "1"
                                                       type="number"
                                                       value="<?php echo $arrayProp['numDorm']?>"
                                                       required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-tint"></i>
                                                &nbsp;&nbsp;
                                                Número de Baños
                                            </td>
                                            <td>
                                                <input name="spn_banios"
                                                       type="number" 
                                                       class="form-control" 
                                                       min = "1" max = "10" 
                                                       step = "1"  
                                                       value="<?php echo $arrayProp['numBanos']?>"
                                                       required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-newspaper-o"></i>
                                                &nbsp;&nbsp;
                                                Descripción
                                            </td>
                                            <td>
                                                <textarea name="txt_descripcion"
                                                          class="form-control" 
                                                          rows="3"
                                                          placeholder="<%=p.getDescripcion()%>"
                                                          value="<%=p.getDescripcion()%>"
                                                          required
                                                          ><?php echo $arrayProp['desc']?></textarea>
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td>
                                                <button name="btn_guardar"
                                                    class="btn btn-warning">
                                                    <i class="fa fa-cloud"></i>
                                                    Guardar cambios
                                                </button>
                                            </td>  
                                            <td>
                                                <button name="btn_eliminar_propiedad" class="btn btn-danger">                                                                                               
                                                    <i class="fa fa-trash"></i>
                                                    Eliminar esta propiedad
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </tbody>
                            </table>
                            <h3>&nbsp;</h3>
                        </div><!--End of form-group-->
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
    </body>
    <?php
            }
            else
            {
                header('Location: ../Ingreso_intranet.php');
            }
    ?>
</html>