<?php
include 'conexion.php';
$conec = conecxion_bd();
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['nombre'])) {
    header("Location: Registro.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Principal</title>
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <!-- Botón primario -->
                <a href="abogado.php"><button type="button" class="btn btn-primary w-100">Dar de alta abogado</button></a>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Botón secundario -->
                <a href="table_abogado.php"><button type="button" class="btn btn-danger w-100">Consultar abogado</button></a>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Botón de éxito -->
              
                <a href="cliente.php"><button type="button" class="btn btn-primary w-100">Dar de alta cliente</button></a>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Botón de peligro -->
               <a href="table_cliente.php"><button type="button" class="btn btn-warning w-100">Consultar cliente</button></a>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Botón de advertencia -->
                
                <a href="asuntos.php"><button type="button" class="btn btn-success w-100">Dar de alta asunto</button></a>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Botón de información -->
                <a href="tabla_asuntos.php"><button type="button" class="btn btn-info w-100">Consultar asunto</button></a>
            </div>
        </div>
        <a href="Registro.php"><button type="button" class="btn btn-info w-100">Cerrar Sesión</button></a>
    </div>
</body>
</html>
