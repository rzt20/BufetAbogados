<?php
include 'conexion.php';
$conec = conecxion_bd();

$sql = "SELECT * FROM abogados";
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
    <h2>Listado de Abogados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>calle</th>
                <th>Colonia</th>
                <th>Numero</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_matricula'] . '</td>';
                    echo '<td>' . $fila['matricula'] . '</td>';
                    echo '<td>' . $fila['nombre'] . '</td>';
                    echo '<td>' . $fila['apellido1'] . '</td>';
                    echo '<td>' . $fila['apellido2'] . '</td>';
                    echo '<td>' . $fila['calle'] . '</td>';
                    echo '<td>' . $fila['colonia'] . '</td>';
                    echo '<td>' . $fila['numero'] . '</td>';
                    echo '<td>';
                    echo '<a href="update.php?id_matricula=' . $fila['id_matricula'] . '" class="btn btn-warning">Editar</a> ';
                    echo '<a href="delete_cliente.php?id_matricula=' . $fila['id_matricula'] . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este cliente?\')">Eliminar</a>';
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
