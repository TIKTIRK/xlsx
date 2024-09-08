<?php
    $server = "MySQL-8.2";
    $username = "root";
    $passord = "";
    $dbname = "work";

    $con = mysqli_connect($server, $username, $passord, $dbname);

    if(!$con){
        die("Connection failed". mysqli_connect_error());
    }
?>