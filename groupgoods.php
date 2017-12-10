<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>團購商品</title>
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
        
        $sql = "SELECT `group_num`,`group_image`,`group_name`,`group_price`,`group_class`,`group_qu`,`group_qu_all`,`group_details`,`datetime` FROM `publishgroup`	 ";
		
		$result = $conn->query($sql);
		mysqli_close($conn);
    ?>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>團購商品</strong> </a>
									
								</header>
								<section>
									<div class="posts">
                                    <?php
										if (mysqli_num_rows($result) > 0) {
										// output data of each row
											while($row = mysqli_fetch_assoc($result)) {
												
												$group_num= $row["group_num"];
												$group_image= $row["group_image"];
												$group_name= $row["group_name"];
												$group_price= $row["group_price"];
												
												$group_class= $row["group_class"];
												$group_qu= $row["group_qu"];
												$group_qu_all= $row["group_qu_all"];
												$group_details= $row["group_details"];
												$datetime= $row["datetime"];
												
												echo'<article>';
												echo'<a href="allgroupspage.php?group_num='.$group_num.'" class="image">';
												?>
												<img src="data:image/png;base64,<?=base64_encode($group_image)?>"/>
												<?php
												echo'</a>';
												echo'	<h3>商品名稱'.$group_name.'</h3>';
												echo'	<p>$'.$group_price.'</p>';
												echo'	<p>結單日：'.$datetime.'</p>';
												echo'	<ul class="actions">';
												echo' <p>目前/成團數量：'.$group_qu.'/'.$group_qu_all.'</p>';
												echo' <ul class="actions">';
												
												echo'   <li><a href="allgroupspage.php?group_num='.$group_num.'" class="button">More</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="button">Share</a></li>';
												echo'   </ul>';
												echo'	</article>	';
											}
										} else {
											echo "0 results";
										}
										
																		

																			
									?>
									</div>
								</section>     
							<!-- Section -->
								

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
							<?php include 'template/group_menu.php'; ?>
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