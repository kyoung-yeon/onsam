<?php
session_start();

include "connect.php";
$id = $_SESSION['id'];
$sql = "delete from user where id = '$id'";
if($result = $mysqli->query($sql)) {
    session_unset();
    session_destroy();
    header("location: index.php");
}
else {
    echo $mysqli->error. ":" . $sql;
}
?>