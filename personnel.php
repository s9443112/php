<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>個人介面</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="static/interface/assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<?php   
		require('script/check_database.php');


		session_start();
		
			 if(isset($_SESSION["Username"])){
				$Person_username = $_SESSION["Username"];
				$sql = "SELECT `Username`,`Email` FROM user WHERE Username='$Person_username'";
					
				$result = $conn->query($sql);
				mysqli_close($conn);
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						$Username= $row["Username"];
						$Email= $row["Email"];
					
					}
				} else {
					echo "0 results";
				}
			 }else{
				
				echo "<script>alert('沒有登入 請重新登入!');history.back();</script>";
			 }

		
	?>  
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="" class="logo"><strong>個人介面</strong> &nbsp;&nbsp;&nbsp;個人ID</a>
									
								</header>

							<!-- Section -->
								<section>
								<div>
									<h3>姓名：<?=$Username ?></h3>
								</div>
								<div>
									<h3>信箱：<?=$Email ?></h3>
								</div>
								<div>
								  <a href="trace.php">追蹤名單</a><hr>
								  <a href="#">設定</a><hr>
                                  <a href="#">我的購買清單</a><hr>
                                  <a href="#">使用者常見問題</a><hr>
                                  
                                  <a href="#">聯絡客服</a><hr>
                                  <a href="#">我的賣場</a><hr>
                                </div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

								<!-- Menu -->
				<?php include 'template/menu.php'; ?>
				</div>
			</div>
		</div>
		<script src="static/interface/assets/js/jquery.min.js"></script>
		<script src="static/interface/assets/js/skel.min.js"></script>
		<script src="static/interface/assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="static/interface/assets/js/main.js"></script>
    </body>
</html>