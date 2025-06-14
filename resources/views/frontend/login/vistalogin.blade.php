<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Don Angel's</title>
    
    <!-- Favicon -->
    <link href="{{ asset('images/icono-sistemalogo.png') }}" rel="icon">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ 'css/login.css' }}">
</head>
<body>
    <div class="stars" id="stars"></div>    
    
    <div class="container">
        <div>
            <div class="demo-container" style="margin-top: 30px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <div class="p-5 rounded shadow-lg" style="background-color: #1c2332;">
                                <div class="logo-container">
                                    <img src="{{ asset('images/AlaI.png') }}" alt="Ala izquierda">
                                    <span class="title">DON ANGEL'S</span>
                                    <img src="{{ asset('images/AlaD.png') }}" alt="Ala derecha">
                                </div>
                               
                                <div class="texto-claro" style="background-color: #1c2332;">
                                    <h3 class="mb-2 text-center pt-5"><strong>&nbsp;</strong></h3>
                                    <p class="text-center lead" style="font-weight: bold">Iniciar</p>

                                    <form>
                                        <label style="margin-top: 10px" class="font-500">Usuario</label>
                                        <input class="form-control form-control-lg mb-3" id="usuario" autocomplete="off" type="text">
                                        
                                        <label class="font-500">Contraseña</label>
                                        <input class="form-control form-control-lg" id="password" type="password">

                                        <input type="button" value="ACCEDER" style="margin-top: 25px; width: 100%; font-weight: bold; background-color: #e3d1c2; color: black; border: none;" onclick="login()" class="button button-uppercase button-primary button-pill">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alertaPersonalizada.js') }}"></script>
    <script src="{{ 'js/login.js' }}" type="text/javascript"></script> 
</body>
</html>
