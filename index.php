<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!--link rel="stylesheet" href="estilos.css"-->
        <link rel="stylesheet" href="estilos_login.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>

    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
    <source src="videos/fondo.mp4" type="video/mp4">
    </video>

    <style>
            #background-video {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
            opacity: 4;
            }
    </style>

    <body style="background-repeat: no-repeat; background-size: 100% 100%; height: 980px;" >
      <?php require_once "vistas/cabecera.php"?>

      <center>
      <div >
            <div class="wrap-login">
                    <form class="login-form validate-form w-25 p-3" id="formLogin" action="" method="post" style = "background-color: white; border-radius: 5px; border-color:white;">
                    <center><span class="login-form-title" style = "font-size: 25px;">SISTEMA DE GESTIÓN DE EXPEDIENTES</span></center>
                    <br>
                        <div class="wrap-input100" data-validate = "Usuario incorrecto">
                            <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario" style = "width: 100%; ">
                            <span class="focus-efecto"></span>
                        </div>

                        <div class="wrap-input100" data-validate="Password incorrecto">
                            <input class="input100" type="password" id="password" name="password" placeholder="Clave Secreta" style = "width: 100%; ">
                            <span class="focus-efecto"></span>
                        </div>
                        <div class="boton_ingresar">
                            <div class="wrap-login-form-btn">
                                <button type="submit" name="submit" class="btn btn-dark btn-block  gradient-custom-2 mb-3">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        </center>
        
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="codigo.js"></script>    
    </body>
</html>