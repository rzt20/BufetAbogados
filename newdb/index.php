<?php
include 'conec.php';
$conec = connection_bd();

// Consultar la base de datos
$sql = "SELECT * FROM personas";
$resultado = $conec->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Personas</title>
</head>
<body>
<div class="container">
    <h2>Listado de Personas</h2>
    <a href="create.php" class="btn btn-primary mb-3">Agregar Persona</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id'] . '</td>';
                    echo '<td>' . $fila['nombre'] . '</td>';
                    echo '<td>' . $fila['apellido1'] . '</td>';
                    echo '<td>' . $fila['apellido2'] . '</td>';
                    echo '<td>' . $fila['direccion'] . '</td>';
                    echo '<td>';
                    echo '<a href="update.php?id=' . $fila['id'] . '" class="btn btn-warning">Editar</a> ';
                    echo '<a href="delete.php?id=' . $fila['id'] . '" class="btn btn-danger">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">No hay registros</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
