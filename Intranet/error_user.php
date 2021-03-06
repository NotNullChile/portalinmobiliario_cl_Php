<html>
    <head>
        <title>Ingreso Intranet</title>
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
                background-image: url(../images/bg.jpg);
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
                            <a href="../propiedades.php">
                                <i class="fa fa-building"></i>
                                &nbsp; Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="../contacto.php">
                                <i class="fa fa-comments"></i>
                                &nbsp; Contacto
                            </a>
                        </li> 
                        <li class="active">
                            <a href="../ingreso_intranet.php">
                                <i class="fa fa-lock"></i>
                                &nbsp; Intranet
                            </a>
                        </li> 
                        <li>
                            <a href="../about.php">
                                <i class="fa fa-code"></i>
                                    &nbsp; by not-null.cl
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
       <!--Formulario de ingreso a intranet corporativa-->      
        <div class="container well">
            <h1>
                <i class="fa fa-user-times"></i> 
                Error:</h1>
            <hr>
            <div class="alert alert-danger">
                <strong>Username y/o password incorrecto(s)!</strong> Vuelva a escribir sus credenciales.
            </div>
            <form form class="form-horizontal" role="form" action="../controller/procesar_Intranet.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2 " for="nombre">
                        <i class="fa fa-user"></i>
                    </label>
                    <div class="col-sm-10">
                        <input type="text"
                            name="txt_username"
                            class="form-control"
                            id="nombre"
                            placeholder="Usuario"
                            required
                            />
                    </div>
                    <label class="control-label col-sm-2" for="password">
                        <i class="fa fa-ellipsis-h"></i>
                    </label>
                    <div class="col-sm-10">
                        <input type="password" 
                            class="form-control" 
                            id="password" 
                            name="txt_password" 
                            placeholder="Contraseña"
                            required
                            />
                    </div>
                    <label class="control-label col-sm-2" for="pregunta">
                        <i class="fa fa-sign-in"></i>
                    </label>
                    <div class="col-sm-10">
                        <button type="submit" 
                                class="btn btn-danger" 
                                name="btn_enviar">Acceder</button>
                    </div>
                </div>
            </form>
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
                                <a xmlns:dct="http://purl.org/dc/terms/" href="https://github.com/NotNullChile/portalinmobiliario_cl_Php" rel="dct:source">
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

