// Event listener for Enter key
var input = document.getElementById("password");
input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        login();
    }
});

// Login function
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

    axios.post('/admin/login', formData, {})
        .then((response) => {
            closeLoading();
            verificar(response);
        })
        .catch((error) => {
            toastr.error('error al iniciar sesión');
            closeLoading();
        });
}

// Verification function
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
                // Action if needed
            }
        })
    } else {
        toastr.error('Error al iniciar sesión');
    }
}

// Star animation
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
