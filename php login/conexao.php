<?php

$host = 'localhost';
$database = 'usuarios';
$usuario = 'root';
$senha = '';

$mysql = new mysqli($host,$usuario,$senha,$database);
if($mysqli -> connect_error){
    die('falha ao conectar: '.$mysqli->connect_error);
}
?>