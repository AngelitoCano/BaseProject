<!DOCTYPE html>
<html lang="es">




<head>
    <title>Login Don Angel's</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">




    <!-- icono del sistema -->
    <link href="{{ asset('images/icono-sistemalogo.png') }}" rel="icon">
    <!-- libreria -->
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" type="text/css" rel="stylesheet" />




    <!-- estilo de toast -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!-- estilo de sweet -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">




    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">




    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">




    <style>
        html, body {
            height: 100%;
            overflow-x: hidden;
            overflow-y: hidden;
        }
        body {
            background-color: #0d1b2a;
            margin: 0;
            height: 100vh;
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
        }




        .login-container {
            background: white;
            padding: 2em;
            border-radius: 25px;
            text-align: center;
            position: relative;
            width: 320px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
        }




        .logo-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2em;
        }




        .logo-container img {
            width: 60px;
            animation: flap 2s ease-in-out infinite;
            transform-origin: center center;
        }




        .logo-container img:first-child {
            transform-origin: right center;
        }




        .logo-container img:last-child {
            transform-origin: left center;
        }




        @keyframes flap {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(5deg); }
        }




        .logo-container .title {
            font-family: 'Roman', bold;
            font-size: 2.8em;
            font-weight: bold;
            background: linear-gradient(90deg, #FFD700, #FFF8DC, #FFD700);
            background-size: 200% auto;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            animation: shine 3s linear infinite;
            margin: 0 5px;
            white-space: nowrap;
        }




        @keyframes shine {
            0% { background-position: 200% center; }
            100% { background-position: -200% center; }
        }




        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
        }




        .login-container button {
            width: 100%;
            background-color:rgb(255, 255, 255);
            color: white;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }




        .demo-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-lg {
            padding: 12px 26px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        ::placeholder {
            font-size:14px;
            letter-spacing:0.5px;
        }




        .form-control-lg {
            font-size: 16px;
            padding: 25px 20px;
        }
        .font-500{
            font-weight:500;
        }




        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
       
        .star {
            position: absolute;
            background-color: yellow;
            border-radius: 50%;
            animation: fall linear infinite;
            box-shadow: 0 0 5px var(--star-color);
        }
        .texto-claro {
    color: #e3d1c2;
}
        @keyframes fall {
            0% {
            transform: translateY(-100px);
            opacity: 1;
            }
            100% {
            transform: translateY(110vh);
            opacity: 0;
            }
        }
    </style>
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
                                <span class="title">DON ANGEL’S</span>
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




                                <input type="button" value="ACCEDER" style="margin-top: 25px; width: 100%; font-weight: bold; background-color: #e3d1c2; color: black; border: none;" onclick="login()" class="button button-uppercase button-primary button-pill" >
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/alertaPersonalizada.js') }}"></script>








<script type="text/javascript">




    // onkey Enter
    var input = document.getElementById("password");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            login();
        }
    });




    // inicio de sesion
    function login() {




        var usuario = document.getElementById('usuario').value;
        var password = document.getElementById('password').value;




        if(usuario === ''){
            toastr.error('Usuario es requerido');
            return;
        }




        if(password === ''){
            toastr.error('Contraseña es requerida');
            return;
        }




        openLoading();




        let formData = new FormData();
        formData.append('usuario', usuario);
        formData.append('password', password);




        axios.post('/admin/login', formData, {
        })
            .then((response) => {
                closeLoading();
                verificar(response);
            })
            .catch((error) => {
                toastr.error('error al iniciar sesión');
                closeLoading();
            });
    }




    // estados de la verificacion
    function verificar(response) {




        if (response.data.success === 0) {
            toastr.error('Validación incorrecta')
        } else if (response.data.success === 1) {
            window.location = response.data.ruta;
        } else if (response.data.success === 2) {
            toastr.error('Contraseña incorrecta');
        } else if (response.data.success === 3) {
            toastr.error('Usuario no encontrado')
        } else if (response.data.success === 5) {
            Swal.fire({
                title: 'Usuario Bloqueado',
                text: "Contactar a la administración",
                icon: 'info',
                showCancelButton: false,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
            }).then((result) => {
                if (result.isConfirmed) {




                }
            })
        }
        else {
            toastr.error('Error al iniciar sesión');
        }
    }




    document.addEventListener('DOMContentLoaded', () => {
        const totalStars = 100;




        for (let i = 0; i < totalStars; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.style.left = `${Math.random() * 100}vw`;
            star.style.top = `${-Math.random() * 100}vh`;
            star.style.width = `${Math.random() * 3 + 1}px`;
            star.style.height = star.style.width;
            star.style.animationDuration = `${Math.random() * 3 + 2}s`;
            star.style.animationDelay = `${Math.random() * 5}s`;
            star.style.setProperty('--star-color', 'yellow');
            document.body.appendChild(star);
        }
    });
</script>
</body>
</html>