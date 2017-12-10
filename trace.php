<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>追蹤</title>
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
		$Username = $_SESSION["Username"];
		$sql = "SELECT A.`Username`,A.`Next_Username` FROM `trace` A ";
		
		 $result = $conn->query($sql);
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
					<a href="index.html" class="logo">
						<strong>追蹤</strong>
					</a>

				</header>

				<!-- Section -->
				<section>
				
					<?php
					echo'	<h3>追蹤名單</h3>';
						if (mysqli_num_rows($result) > 0) {
						// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								
								$Username= $row["Username"];
								$Next_Username= $row["Next_Username"];
								
								echo'
								<div>
									<h3>'.$Next_Username.'</h3>
								</div>';

							
							}
						} else {
							echo "0 results";
						}
									
					?>
				
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