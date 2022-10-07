<?php

try {
    $host = 'sintax.com.co';
    $database = 'u400709824_sanidad';
    $user = 'u400709824_sanidad';
    $password = 'pr[qMrq=x[L9';

    $conexion = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password, array(
        PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    return $conexion;
} catch (PDOException $e) {
    echo "Error al conectar la base de datos: ".$e->getMessage();
}