<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencias</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

</head>
<body>
    
    <div class="container">
        <div class="form-container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Centro de Salud Tambo de Mora">
                </a>
            </div>
            <div class="login-form">
                <h2>INICIO DE SESIÓN</h2>
                <form class="form" action="backend/login.php" method="POST">
                <!-- modulo 4k -->
                <div class="input-group">
                    <label for="modulo">Módulo:</label>
                    <select name="modulo" id="modulo" required>
                        <option value="">Seleccione una Opción</option>
                        <option value="super_admn">Super Administrador</option>
                        <option value="administracion">Administración del sistema</option>
                        <option value="aplicacion">Aplicación del sistema</option>
                    </select>
                </div>
                <!-- Usuario (DNI) -->
                <div class="input-group">
                    <label for="usuario">Dni:</label>
                    <input type="text" id="usuario" name="usuario" required autofocus>
                    <div id="respuesta"></div>
                </div>
                <!-- Contrasena -->
                <div class="input-group">
                    <div class="password-wrapper">
                        <label for="contraseña">Contraseña:</label><br>
                        <input type="password" id="password" name="contrasena" required>
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </div>
                </div>
                <!-- boton de inicio -->
                <button class="button_interactivo" type="submit" id="btnEnviar">
                    Acceder
                </button>
            </form>
            </div>
        </div>
        <img class="img_fondo" src="img/fondo_comercio.jpg" alt="Andrés Avelino Cáceres">
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Alternar el tipo de input de 'password' a 'text'
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Alternar el icono
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
