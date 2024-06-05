<?php
require_once 'conec.php';
$conec = connection_bd();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM personas WHERE id=$id";
    if ($conec->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar el registro: " . $conec->error;
    }
} else {
    echo "ID no proporcionado para eliminar";
}
?>
