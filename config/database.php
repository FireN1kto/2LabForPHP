<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'guarantee_repair';

// Подключение к MySQL
$mysqli = mysqli_connect($host, $user, $password, $database);

// Проверка ошибок подключения
if (mysqli_connect_errno()) {
    die("Ошибка подключения к MySQL: " . mysqli_connect_error());
}


mysqli_set_charset($mysqli, 'utf8');
?>