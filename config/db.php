<?php

/**
 * Инициализация подключения к БД
 */
$dblocation = "127.0.0.1";
$dbname = "shop";
$dbuser = "user";
$dbpasswd = "qwerty";

$db = mysqli_connect($dblocation, $dbuser, $dbpasswd);

if (!$db) {
    echo 'Ошибка доступа к MySQL';
    exit();
}

mysqli_set_charset($db, 'utf8');

if (!mysqli_select_db($db, $dbname)) {
    echo 'Ошибка доступа к базе данных';
    exit();
}