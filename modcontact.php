<?php session_start() ?>
<!DOCTYPE html>
<html lang="ko">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On-SAM</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/newcontact.css">
  
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

  <section class="new">
    <h1>게시판</h1>
    <div class="new__card">
    <p>메세지 내용을 확인하고 수정합니다.</p>
        <?php
        include_once "connect.php";

        $no = $_POST['no'];
        $passwd = $_POST['passwd'];
        $sql = "select * from board where no= $no";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
            if($passwd != $row[7])
              die("게시글의 비밀번호가 맞지 않습니다.") ;
        }
        else echo $mysqli->error . ":" .$sql;
        ?>
        
        <div class="container">
          <form action="modcontact_proc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="title">제목</label>
              </div>
              <div class="col-75">
                <input type="number" name="no" value="<?=$row[0]?>" hidden>
                <input type="text" name="title" value="<?=$row[3]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="name">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="name" value="<?=$row[1]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="email">이메일</label>
              </div>
              <div class="col-75">
                <input type="email" name="email" value="<?=$row[2]?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="msg">메세지</label>
              </div>
              <textarea name="msg" cols="80" rows="10"><?=$row[4]?></textarea>
            <div class="row">
            
              <button type="button" 
                  onclick="location.href='delcontact.php?no=<?=$row[0]?>'"> 삭제하기 </button>
              <input type="submit" value="수정하기">
            </div>
          </form>
        </div>
      </div>
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
