<?php
    function conecxion_bd(){
        $servidor="localhost";
        $user="root";
        $pass="";
        $bd="juridico";


        return $conexion= new mysqli($servidor,$user,$pass,$bd);

        echo "Conexion exitosa";


    }
?>