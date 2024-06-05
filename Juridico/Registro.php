<?php
session_start();

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a la base de datos
    include 'conexion.php';
    $conec = conecxion_bd();

    // Obtiene los datos del formulario
    $username = $_POST['nombre'];
    $password = $_POST['contraseña'];

    // Consulta para buscar al usuario en la base de datos
    $sql = "SELECT id, nombre FROM adminitradores WHERE nombre = ? AND contraseña = ?";
    
    // Prepara la consulta
    $stmt = $conec->prepare($sql);

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conec->error);
    }

    // Vincula los parámetros a la consulta
    $stmt->bind_param("ss", $username, $password);
    
    // Ejecuta la consulta
    $stmt->execute();
    
    // Obtiene el resultado
    $result = $stmt->get_result();
    
    // Verifica si se encontró al usuario
    if ($result->num_rows == 1) {
        // Inicia sesión y redirige al usuario
        $_SESSION['nombre'] = $username;
        header("Location: index.php");
        exit;
    } else {
        // Si no se encontró al usuario, muestra un mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5 text-center">Iniciar Sesión</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

