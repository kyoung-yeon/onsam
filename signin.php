<?php session_start() ?>
<!doctype html>
<html lang="ko">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On-SAM</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/signinphp.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollToPlugin.min.js" integrity="sha512-kSI9CgGh60rJbNVeMJvfNX0UTKAq8LEOea/yKJQbFpIroxT7bf9/zUFXbnfsQP5F6xlOOHtCfBPgsE1ceiHnRw==" crossorigin="anonymous"></script>

  <!--SWIPER-->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  
  <script defer src="./js/youtube.js"></script>
  <script defer src="./js/common.js"></script>
  <script defer src="./js/main.js"></script>

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
        <li>
          <?php 
          if(isset($_SESSION['name'])){
          ?>
        <li>
            <a href=""><?= $_SESSION['name'] ?>님</a>
          </li>
          <li>
            <a href="logout.php">로그아웃</a>
          </li>
          <li>
            <a href="signmodify.php">정보수정</a>
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
    #입력값을 가져오기
    if(isset($_POST['id'])) $id = $_POST['id'];
    else {
        die("아이디가 입력되지 않았습니다.");
        header("location : signin.html");
    }
    $pwd = $_POST['pwd'];
    ?>

    <?php
    #SQL 실행하기
    $sql = "select * from user where id = '$id' and pwd = '$pwd'";
    $result = $mysqli->query($sql);
    #결과 확인하기
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();  //$row는 연관배열 : (키, 값) 배열
        #세션 생성하기
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
    ?>
    
    <div class="signin__card">
        <h2>WELCOME 로그인되었습니다.</h2>
        <div class="bt">
          <a href = 'index.php'>[확인] 메인페이지로 이동 </a>
        </div>
    </div>
                <?php
                }
                else {
                    ?>
  
    <p>로그인이 실패하였습니다.<br></p>
    
    
    
    <?php
    
      }
      ?>
</section>

<!--FOOTER-->
<footer>
  <div class="inner">

    <ul class="menu">
      <li><a href="javascript:void(0)" class="green">개인정보보호</a></li>
      <li><a href="javascript:void(0)">이메일 무단 수집 거부</a></li>
      <li><a href="javascript:void(0)">지적재산 보호</a></li>
    </ul>

    <div class="btn-group">
      <a href="javascript:void(0)" class="btn btn--white">찾아오시는 길</a>
      <a href="http://www.sen.go.kr/main/services/index/index.action" class="btn btn--white">서울시 교육청</a>
    </div>

    <div class="info">
      <span>온샘(On-SAM)</span>
      <span>TEL : 02) 8090-1123 / FAX : 02) 1005-1123</span>
      <span>김경연</span>
    </div>

    <p class="copyright">
      &copy; <span class="this-year"></span> On-SAM School. All Rights Reserved.
    </p>
  </div>
</footer>

</body>
</html>
