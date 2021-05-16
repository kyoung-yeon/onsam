<?php session_start(); ?>
<!DOCTYPE html>
<html>
<html lang="ko">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On-SAM</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/signin.css">
  
  <script defer src="./js/common.js"></script>

</head>

  <body>
    
  <!-- HEADER -->
  <header>
    <div class="inner">

      <a href="index.php" class="logo">
        <img src="./images/로고.png" alt="On-SAM">
        <img src="./images/그림3.png" alt="On-SAM">
      </a>

      <div class="sub-menu">
        <ul class="menu">
        <?php 
        if(isset($_SESSION['name'])){
        ?>
        <li>
            <a href=""><?= $_SESSION['name'] ?>님</a>
          </li>
          <li>
            <a href="./logout.php">로그아웃</a>
          </li>
          <li>
            <a href="./signmodify.php">정보수정</a>
          </li>
          <?php } else { ?>
          <li>
            <a href="./signin.html">로그인</a>
          </li>
          <li>
            <a href="./join.html">회원가입</a>
          </li>
          <li>
            <a href="javascript:void(0)">알림</a>
          </li>
        </ul>
        <div class="search">
          <input type="text">
          <div class="material-icons">search</div>
        </div>
        <?php } ?>
      </div>

      <ul class="main-menu">
        <li class="item">
          <div class="item__name">수행대회</div>
          <div class="item__contents">
            <div class="contents__menu">
              <ul class="inner">
                
                <li>
                  <h4>수행평가</h4>
                  <ul>
                    <li>국어</li>
                    <li>영어</li>
                    <li>수학</li>
                    <li>사회</li>
                    <li>과학</li>
                  </ul>
                </li>
                <li>
                  <h4>경시대회</h4>
                  <ul>
                    <li>전체</li>
                    <li>교내</li>
                    <li>교외</li>
                  </ul>
                </li>
                
              </ul>
            </div>

          </div>
        </li>
        <li class="item">
          <a href="javascript:void(0)"><div class="item__name">자료실</div></a>
        </li>
        <li class="item">
          <a href="javascript:void(0)"><div class="item__name">공지사항</div></a>
        </li>

        <li class="item">
          <a href="listcontact.php?page=1"><div class="item__name">게시판</div></a>
        </li>
      </ul>
    </div>

    <div class="badges">
      <div class="badge">
        <a href="https://edu.google.com/intl/ALL_kr/products/classroom/?gclid=EAIaIQobChMIqreNn6vI8AIVCVpgCh0K3AUsEAAYASAAEgJ89_D_BwE&gclsrc=aw.ds">
          <img src="./images/badge.jpg" alt="Badge"></a>
      </div>
      <div class="badge">
        <a href="https://www.ebsi.co.kr/ebs/pot/poti/main.ebs">
          <img src="./images/badge2.jpg" alt="Badge"></a>
      </div>
    </div>
  </header>

  <section class="signin">
  <?php
  include "connect.php";
  $id=$_SESSION['id'];
  $sql = "select * from user where id = '$id'";
  $result = $mysqli->query($sql);
  if ($result !== false && $result->num_rows > 0){
      $row = $result->fetch_row();//1차원 배열. 값만 존재
  ?>    
        <div class="signin__card">
          <h2>회원정보수정</h2> 
          <div class="container">
            <form action="signmodifyproc.php" method="post">
              <div class="row">
                <div class="col-25">
                  <label for="fname">아이디</label>
                </div>
                <div class="col-75">
                  <input type="text" name="id" value="<?=$row[1]?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">이름</label>
                </div>
                <div class="col-75">
                  <input type="text" name="name" value="<?=$row[3]?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">비밀번호</label>
                </div>
                <div class="col-75">
                  <input type="text" name="pwd" value="<?=$row[2]?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">전화번호</label>
                </div>
                <div class="col-75">
                  <input type="text" name="tel" value="<?=$row[4]?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">EMAIL</label>
                </div>
                <div class="col-75">
                  <input type="text" name="email" value="<?=$row[5]?>">
                </div>
              </div>
              <div class="row">
              <input type="submit" value="수정하기">
              <?php
              if(!isset($_SESSION['id'])) {
                  echo "<script>alert('회원정보가 수정되었습니다.')</script>";
                  echo "<script>location.href='index.php'</script>";
              }
              ?>
    
                <button type="button" 
                    onclick="location.href='signout.php'">탈퇴하기 </button>
              </div>
            </form>
          </div>
        </div>
    <?php  } ?>
  </section>
    </body>
</html>