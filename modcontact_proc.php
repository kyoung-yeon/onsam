<?php
//session_start();
include_once "connect.php";

if(!empty($_POST['title'])) $title = $_POST['title'];
else die("title 입력필드에 값이 없습니다.");
if(!empty($_POST['name'])) $name = $_POST['name'];
else die("name 입력필드에 값이 없습니다.");
if(!empty($_POST['email'])) $email = $_POST['email'];
else die("email 입력필드에 값이 없습니다.");
if(!empty($_POST['msg'])) $msg = $_POST['msg'];
else die("msg 입력필드에 값이 없습니다.");
if(!empty($_POST['no'])) $no = $_POST['no'];
else die("no 입력필드에 값이 없습니다.");


$sql = "update board set title = '$title', name = '$name', email = '$email',
                        msg = '$msg' where no = '$no'";
if($result = $mysqli->query($sql)) {
    header("location: listcontact.php?page=1");
}
else {
    echo $mysqli->error. ":" . $sql;
}
?>