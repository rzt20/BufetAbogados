<?php
    function connection_bd(){
        $servidor="localhost";
        $user="root";
        $pass="";
        $bd="persons";


        return $conexion= new mysqli($servidor,$user,$pass,$bd);


    }
?>