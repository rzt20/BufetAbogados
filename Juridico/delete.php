<?php
require_once 'conexion.php';
$conec = conecxion_bd();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_matricula'])) {
    $id_matricula = $_GET['id_matricula'];

    $sql = "DELETE FROM abogados WHERE id_matricula=?";
    $stmt = $conec->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $id_matricula);
        if ($stmt->execute()) {
            echo "Registro eliminado exitosamente.";
            // Redirigir a la página principal o una página de confirmación
            header("Location: index.php");
            exit; // Asegúrate de que el script se detiene después de redirigir
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conec->error;
    }
} else {
    echo "ID no proporcionado";
}
$conec->close();
?>
