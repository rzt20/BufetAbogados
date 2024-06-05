<?php
include 'conexion.php';
$conec = conecxion_bd();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nom_expediente = $_POST['nom_expediente'] ?? '';
    $periodo = $_POST['periodo'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $id_dni = $_POST['id_dni'] ?? '';
    $id_matricula = $_POST['id_matricula'] ?? '';
    

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO asuntos (nom_expediente, periodo, estado, id_dni, id_matricula, ) VALUES (?,?, ?, ?, ?, )";

    // Prepara la consulta
    $stmt = $conec->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssi", $nom_expediente, $periodo, $estado, $id_dni, $id_matricula, );
        
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
        <h2>Registro de Asuntos</h2>
        <form action="abogado.php" method="post">
            <div class="mb-3">
                <label for="matricula" class="form-label">Nombre expediente</label>
                <input type="text" class="form-control" id="nom_expediente" name="nom_expediente" maxlength="15" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Periodo</label>
                <input type="text" class="form-control" id="periodo" name="periodo" maxlength="30">
            </div>
            <div class="mb-3">
                <label for="apellido1" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="id_dni" class="form-label">Clientes</label>
                <input type="text" class="form-control" id="id_dni" name="id_dni" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="id_matricula" class="form-label">Abogados</label>
                <input type="text" class="form-control" id="id_matricula" name="id_matricula" maxlength="15">
            </div>
            
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>