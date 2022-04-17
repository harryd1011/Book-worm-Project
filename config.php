<?php
    session_start();
    $dbHost= 'localhost';
    $dbName= 'login';
    $dbUsername= 'root';
    $dbPassword= '';

    $dbc=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
?>