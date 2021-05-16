<?php session_start() ?>
<!DOCTYPE html>
<html lang="ko">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On-SAM</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/listcontact.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollToPlugin.min.js" integrity="sha512-kSI9CgGh60rJbNVeMJvfNX0UTKAq8LEOea/yKJQbFpIroxT7bf9/zUFXbnfsQP5F6xlOOHtCfBPgsE1ceiHnRw==" crossorigin="anonymous"></script>

  <!--SWIPER-->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  
  <script defer src="./js/youtube.js"></script>
  <script defer src="./js/common.js"></script>
  <script defer src="./js/main.js"></script>

  <style>
            * {
                box-sizing: border-box;
            }
            body {
                background-color: white;
                color:#3c3c3c;
            }
            #hotel {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                text-align: center;
            }

            #hotel td, #hotel th {
                border: 1px solid #ddd;
                padding: 3px;
            }

            #hotel th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: center;
                background-color: #FFEFD5;
                color: #3c3c3c;
            }    
            /* Style Page */
            .paging_area { 
                text-align: center;
                width: 100%;
                height: 50px;
                padding-top: 7px;
                margin-left: auto;
                padding-left: 50px;
            }
            .paging_area a, .paging_area span {
                
                color: black;
                display: inline-block;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
            }

            .paging_area a:hover:not(.active) {background-color: #fefefe;}

         
            .topnav input[type=text] {
              padding: 6px;
              margin-top: 8px;
              font-size: 17px;
              border: 3px solid #ddd;
                margin-right: 6px; 
                margin-bottom: 10px;
            }

            .topnav .search-container {
                margin-left: 380px;
                
            }
            .topnav .search-container button {
              padding: 6px 10px;
              margin-top: 8px;
              margin-right: 16px;
              background: #ddd;
              font-size: 17px;
              border: none;
              cursor: pointer;
            }

            .topnav .search-container button:hover {
              background: #ccc;
            }
            button {
            background-color: #ddd;
            color: black;
            padding: 10px 18px;
            border: none;
            cursor: pointer;
            margin:3px;

            }
            button:hover {

            background-color: grey;

            }
            .body {
                width:1170px;
                padding-left: 120px;
            }
            .a {
                background-color: #FFEFD5;
                padding-top: 2px;
                padding-bottom: 10px;
                padding-left: 10px;
            }
        </style>
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


  <section class="bd">
    <div class="bd__card">
  <?php
        include_once "connect.php";

        if(isset($_GET['search']) && strpos($_GET['search'],"%") === false) 
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) 
            $search = "%";
        else $search = $_GET['search']; 

        $listsize = 6; 
        $pages=3; 
        
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $mysqli->query("select count(*) from board
                                where title like '$search'");
        $row = $result->fetch_row();
        $rowcount = $row[0]; 
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++;  
        
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        
        $offset = ($page - 1) * $listsize;
        $sql = "select * from board where title like '$search' 
                order by no desc limit $offset, $listsize";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0) {
        ?>
        <table id="board">
            <tr>
            <th style="width:7%">번호</th>
            <th>제목</th>
            <th style="width:10%">작성자</th>
            <th style="width:15%">이메일</th>
            <th style="width:15%">작성일</th>
            </tr>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['no']?></td>
                <td><a href="modcontact_check.php?no=<?=$row['no']?>"><?=$row['title']?></a></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['wdate']?></td>
            </tr>
        <?php } ?>
        </table>
        <!-- Paging -->
        <div class="paging_area">
                <?php
                if($page > 1) {
                    $prev = $page - 1;
                    echo "<a href='listcontact.php?page=$prev&search=$search'>PREV</a>";
                }
                else
                    echo "<span>PREV</span>";
            
                for($p=$startpage;$p<=$endpage;$p++) {
                    if($page == $p)
                        echo "<a class='active' href='#'>$p</a>";
                    else
                         echo "<a href='listcontact.php?page=$p&search=$search'>$p</a>";
                }
         
                if($page < $endpage) {
                    $prev = $page + 1;
                    echo "<a href='listcontact.php?page=$prev&search=$search'>NEXT</a>";
                }
                else
                    echo "<span>NEXT</span>";
                ?>
    
                <button type="button" 
                  onclick="location.href='newcontact.php'" style="float:right"> 글쓰기 </button>
        </div>
        <div class="topnav">
            <div class="search-container">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
                        <input type="text" name="page" value="1" hidden>
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                </form>
            </div>
        </div>

        <?php }  else {?>
            <h4>
              작성된 글이 없습니다.
            </h4>
            <div class="paging_area">
              <button type="button" 
                  onclick="location.href='newcontact.php'" style="float:right"> 글쓰기 </button>
              </div>
        <?php
        }

        $mysqli->close();
        ?>
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