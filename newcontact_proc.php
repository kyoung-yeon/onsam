<?php
session_start();
include_once "connect.php";

#데이터 읽어오기
$wdate = date("Y/m/d");
$id = $_SESSION['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$title = $_POST['title'];
$pwd = $_POST['pwd'];
$local = $_POST['local'];

#SQL문 작성
$sql = "insert into board(name,email,title,msg,id,wdate,passwd,local) 
        values('$name','$email','$title','$msg','$id','$wdate','$pwd','$local')";
#SQL문 실행
if($result = $mysqli->query($sql)) {
    echo "<script>location.href='listcontact.php?page=1'</script>";  //함수호출
}
else
    echo $mysqli->error . ":". $sql;
?>