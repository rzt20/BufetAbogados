<?php
require_once 'conexion.php';
$conec = conecxion_bd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_matricula = $_POST['id_matricula'] ?? 0;
    $matricula = $_POST['matricula'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido1 = $_POST['apellido1'] ?? '';
    $apellido2 = $_POST['apellido2'] ?? '';
    $calle = $_POST['calle'] ?? '';
    $colonia = $_POST['colonia'] ?? '';
    $numero = $_POST['numero'] ?? 0;

    $sql = "UPDATE abogados SET matricula=?, nombre=?, apellido1=?, apellido2=?, calle=?, colonia=?, numero=? WHERE id_matricula=?";
    $stmt = $conec->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssii", $matricula, $nombre, $apellido1, $apellido2, $calle, $colonia, $numero, $id_matricula);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit; // Asegúrate de que el script se detiene después de redirigir
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conec->error;
    }
} else {
    if (isset($_GET['id_matricula'])) {
        $id_matricula = $_GET['id_matricula'];
        $sql = "SELECT * FROM abogados WHERE id_matricula=?";
        $stmt = $conec->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id_matricula);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
            } else {
                echo "No se encontraron registros";
                exit;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conec->error;
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
        <input type="hidden" name="id_matricula" value="<?php echo htmlspecialchars($id_matricula); ?>">
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" maxlength="15" value="<?php echo htmlspecialchars($fila['matricula'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="30" value="<?php echo htmlspecialchars($fila['nombre'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="apellido1" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" maxlength="15" value="<?php echo htmlspecialchars($fila['apellido1'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="apellido2" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" maxlength="15" value="<?php echo htmlspecialchars($fila['apellido2'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="calle" class="form-label">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle" maxlength="15" value="<?php echo htmlspecialchars($fila['calle'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="colonia" class="form-label">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" maxlength="45" value="<?php echo htmlspecialchars($fila['colonia'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" max="9999999999" value="<?php echo htmlspecialchars($fila['numero'] ?? ''); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
