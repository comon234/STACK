<?php
session_start();
$host ="localhost";
$user ="root";
$pass ="digh1221";
//mysql 연동
$mysqli = new mysqli($host,$user,$pass);
if(!$mysqli){
	die('MySQL connect ERROR:'.mysql_error());
}
//데이터 베이스 진입
$ret = mysqli_select_db($mysqli,'stack');
if(!$ret){
	die('db connect error:'.mysql_error());
}

if(isset($_GET['bno'])){
$bno = $_GET['bno'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>자유게시판 글쓰기</title>
  <!-- Bootstrap core CSS-->
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="./vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="./css1/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/normalize.css" />
  <link rel="stylesheet" href="./css/board.css" />
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../home.php">Good Games</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../home.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">메인</span>
          </a>
        </li>
	<!--자유 게시판-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="../free-community.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">자유게시판</span>
          </a>
        </li>
	<!--게임 순위-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="../game-ranking.html">
            <i class="fa fa-fw fa-trophy"></i>
            <span class="nav-link-text">게임 순위</span>
          </a>
        </li>
	<!--게임 추천 게시판-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gamepad"></i>
            <span class="nav-link-text">게임추천 게시판</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="../rpg-community.html">RPG</a>
            </li>
            <li>
              <a href="../fps-community.html">FPS</a>
            </li>
	    <li>
              <a href="../aos-community.html">AOS</a>
            </li>
	    <li>
              <a href="../etc-community.html"">기타</a>
            </li>
          </ul>
        </li>
	<!--등록-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">register</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
	   <!-- 두번째 아이템 넣기
            <li>
              <a href="login.php">로그인</a>
            </li>
	  <-->
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">회원 등록</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="../register.php">회원가입</a>
                </li>
                <li>
                  <a href="../forgot-password.html">비밀번호 찾기</a>
                </li>
                <li>
                  <a href="#">아이디 찾기</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
<?php
if(isset($_SESSION['is_login'])){//세션 값이 없을때 = "로그인 전 상태"
?>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>로그아웃</a>
        </li>
<?php
}else{
?>
	<li class="nav-item">
            <a class="nav-link" href="../GoodGames/login.php">
	     <i class="fa fa-fw fa-sign-in"></i>로그인</a>
        </li>
<?php
}
?>
      </ul>
    </div>
  </nav>
<!-- nav end-->
<!-- nav end-->
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">GoodGames</a>
        </li>
        <li class="breadcrumb-item active">Game Image</li>
      </ol>
	<article class="boardArticle">
		<h3>자유게시판 글삭제</h3>
		<?php
			if(isset($bno)) {
				$sql = 'select count(b_no) as cnt from board_advertisement where b_no = ' . $bno;
				$result = mysqli_query($mysqli,$sql);
				$row = mysqli_fetch_assoc($result);
				if(empty($row['cnt'])) {
		?>
		<script>
			alert('글이 존재하지 않습니다.');
			history.back();
		</script>
		<?php
			exit;
				}

				$sql = 'select b_title from board_advertisement where b_no = ' . $bno;
				$result = mysqli_query($mysqli,$sql);
				$row = mysqli_fetch_assoc($result);
		?>
		<div id="boardDelete">
			<form action="./delete_update.php" method="post">
				<input type="hidden" name="bno" value="<?php echo $bno?>">
				<table>
					<caption class="readHide">자유게시판 글삭제</caption>
					<thead>
						<tr>
							<th scope="col" colspan="2">글삭제</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">글 제목</th>
							<td><?php echo $row['b_title']?></td>
						</tr>

					</tbody>
				</table>

				<div class="btnSet">
					<button type="submit" class="btnSubmit btn">삭제</button>
					<a href="../home.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	<?php
		//$bno이 없다면 삭제 실패
		} else {
	?>
		<script>
			alert('정상적인 경로를 이용해주세요.');
			history.back();
		</script>
	<?php
			exit;
		}
	?>
	</article>
	</div>
	</div>
<a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">로그아웃 하시겠습니까?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">로그아웃 버튼을 누르면 로그인 세션 파괴</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
            <a class="btn btn-primary" href="../logout.php">로그아웃</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="./vendor/chart.js/Chart.min.js"></script>
    <script src="./vendor/datatables/jquery.dataTables.js"></script>
    <script src="./vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./js1/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="./js1/sb-admin-datatables.min.js"></script>
    <script src="./js1/sb-admin-charts.min.js"></script>
  </div>
</body>
</html>
