
<?php
require_once 'conec.php';
$conec = connection_bd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE personas SET nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', direccion='$direccion' WHERE id=$id";
    if ($conec->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conec->error;
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM personas WHERE id=$id";
        $resultado = $conec->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
        } else {
            echo "No se encontraron registros";
            exit;
        }
    } else {
        echo "ID no proporcionado";
        exit;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Persona</title>
</head>
<body>
<div class="container">
    <h2>Editar Persona</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $fila['apellido1']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $fila['apellido2']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $fila['direccion']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
