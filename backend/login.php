<?php
session_start();
include("conexion.php");

if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

$modulo = $_POST['modulo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$stmt = $conex->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
$stmt->bind_param("ss", $usuario, $contrasena);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $id_rol = $user['id_rol'];
    
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_rol'] = $id_rol;
    
    //segun su id y su modulo se manda a las direcciones de el header
    if ($modulo == 'administracion') {
        if ($id_rol == 1 || $id_rol == 2) {
            header("Location: ../sections/panel_administrador.php");
            exit();
        } else {
            $error_message = "Acceso denegado. No tiene permiso para acceder a la administración.";
        }
    } elseif ($modulo == 'aplicacion') {
        if ($id_rol == 1 || $id_rol == 3) {
            header("Location: ../sections/panel_aplicacion.php");
            exit();
        } else {
            $error_message = "Acceso denegado. No tiene permiso para acceder a la aplicación del sistema.";
        }
    } elseif ($modulo == 'super_admn') {
        if ($id_rol == 1) {
            header("Location: ../sections/panel_superadmn.php");
            exit();
        } else {
            $error_message = "Acceso denegado. No tiene permiso para acceder al módulo de Super Administrador.";
        }
    } else {
        $error_message = "Módulo no válido.";
    }    
} else {
    $error_message = "Usuario o contraseña incorrectos.";
}
$stmt->close();
$conex->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Inicio de Sesión</title>
    <style>
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
            margin: 20px auto;
            width: 300px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
                <br><br>
                <a href="../index.php">Regresar</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>