
<?php
require_once 'conec.php';
$conec = connection_bd();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO personas (nombre, apellido1, apellido2, direccion) VALUES ('$nombre', '$apellido1', '$apellido2', '$direccion')";
    if ($conec->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conec->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD en PHP</title>
</head>
<body>
<div class="container">
    <h2>Agregar Persona</h2>
    <form action="create.php" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" required>
        </div>
        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
</body>
</html>
