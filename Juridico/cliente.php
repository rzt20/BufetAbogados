<?php
include 'conexion.php';
$conec = conecxion_bd();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $dni = $_POST['dni'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido1 = $_POST['apellido1'] ?? '';
    $apellido2 = $_POST['apellido2'] ?? '';
    $calle = $_POST['calle'] ?? '';
    $colonia = $_POST['colonia'] ?? '';
    $numero = $_POST['numero'] ?? 0;

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO cliente (dni, nombre, apellido1, apellido2, calle, colonia, numero) VALUES (?,?, ?, ?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = $conec->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssi", $dni, $nombre, $apellido1, $apellido2, $calle, $colonia, $numero);
        
        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conec->error;
    }

    $conec->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Formulario de Registro</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Registro de clientes</h2>
        <form action="cliente.php" method="post">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" maxlength="15" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="30">
            </div>
            <div class="mb-3">
                <label for="apellido1" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="apellido2" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="colonia" maxlength="45">
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" class="form-control" id="numero" name="numero" max="9999999999">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
