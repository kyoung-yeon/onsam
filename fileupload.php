<?php
$upload_dir = "upload/"; 
$upload_file = $upload_dir . basename($_FILES['local']['name']);  
$is_ok = 1;

if(file_exists($upload_file)) {
    echo "이미 같은 이름의 파일이 존재합니다.";
    $is_ok = 0;
}

$type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION)); 
if($type != "jpg" && $type != "png" && $type != "gif" && $type != "hwp") {
    echo "파일의 타입이 맞지 않습니다.(JPG, PNG, GIF, hwp)";
    $is_ok = 0;
}

if($_FILES['local']['size'] > 1024 *1024* 20) { 
    echo "파일의 크기가 최대 크기를 초과하였습니다.";
    $is_ok = 0;
}
if($is_ok == 1) {
    if(move_uploaded_file($_FILES['local']['tmp_name'], $upload_file)) {
        echo "<h3> 파일업로드 성공 </h3>";
    }
    else echo "<h3>파일 업로드 실패</h3>";
}
?>