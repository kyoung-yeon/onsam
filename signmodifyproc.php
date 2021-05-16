<?php
session_start();
include "connect.php";

# 입력양식에 입력된 데이터 가져오기
if(!empty($_POST['id'])) $id = $_POST['id'];
else die("id 입력필드에 값이 없습니다.");
if(!empty($_POST['name'])) $name = $_POST['name'];
else die("name 입력필드에 값이 없습니다.");
if(!empty($_POST['pwd'])) $pwd = $_POST['pwd'];
else die("pwd 입력필드에 값이 없습니다.");
if(!empty($_POST['tel'])) $tel = $_POST['tel'];
else die("tel 입력필드에 값이 없습니다.");
if(!empty($_POST['email'])) $email = $_POST['email'];
else die("email 입력필드에 값이 없습니다.");

$sql = "update user set name = '$name', pwd = '$pwd', tel = '$tel', email = '$email'
                         where id = '$id'";
if($result = $mysqli->query($sql)) {
    $_SESSION['name'] = $name;
    
    echo "<script>alert('회원정보를 수정하였습니다.')</script>";
    echo "<script>location.href='index.php'</script>";
}
else {
    echo $mysqli->error. ":" . $sql;
}
?>
