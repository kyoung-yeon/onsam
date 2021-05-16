<?php
include_once "connect.php";

$no = $_GET['no'];
$sql = "delete from board where no = '$no'";
if($result = $mysqli->query($sql)) {
    header("location: listcontact.php?page=1");
}
else {
    echo $mysqli->error. ":" . $sql;
}
?>