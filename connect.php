<?php
    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $dbName = 'onsam';

    $mysqli = new mysqli($host, $user, $pw, $dbName);
    if($mysqli->connect_error) {
        die("접속오류 : " . $mysqli->connect_error);
    }