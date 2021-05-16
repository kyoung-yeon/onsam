<?php
session_start();

session_unset();    // 세션데이터 전체 삭제
session_destroy();  // 세션 정보 삭제

# 자동으로 페이지 이동하는 방법 3가지
header("location: index.php");   

?>