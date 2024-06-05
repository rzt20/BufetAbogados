<?php
include 'conexion.php';
$conec = conecxion_bd();

$sql = "SELECT * FROM asuntos";
$resultado = $conec->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Listado de Personas</title>
</head>
<body>
<div class="container">
    <h2>Listado de Asuntos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre expediente</th>
                <th>periodo</th>
                <th>Estado</th>
                <th>Abogados</th>
                <th>Clientes</th>
                <th>Acciones</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $fila['id_asunto'] . '</td>';
                    echo '<td>' . $fila['nom_expediente'] . '</td>';
                    echo '<td>' . $fila['periodo'] . '</td>';
                    echo '<td>' . $fila['estado'] . '</td>';
                    echo '<td>' . $fila['id_dni'] . '</td>';
                    echo '<td>' . $fila['id_matricula'] . '</td>';
                    echo '<td>';
                    echo '<a href="update.php?id_asunto=' . $fila['id_asunto'] . '" class="btn btn-warning">Editar</a> ';
                    echo '<a href="delete.php?id_asunto=' . $fila['id_asunto'] . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este cliente?\')">Eliminar</a>';
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
