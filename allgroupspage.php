<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>團購商品介面</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="static/interface/assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<?php 
	require('script/check_database.php');
    
    $number = $_GET["group_num"];
    // Create connection
   


    session_start();

    $sql = "SELECT `group_num`,`group_image`,`group_name`,`group_price`,`group_class`,`group_item_order`,`group_qu`,`group_qu_all`,`group_details`,`datetime` 
	FROM `publishgroup`	WHERE `group_num`=$number";
        
	$result = $conn->query($sql);
	mysqli_close($conn);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
			$group_num= $row["group_num"];
			$group_image= $row["group_image"];
			$group_name= $row["group_name"];
			$group_price= $row["group_price"];
			$group_item_order = $row["group_item_order"];
			$group_class= $row["group_class"];
			$group_qu= $row["group_qu"];
			$group_qu_all= $row["group_qu_all"];
			$group_details= $row["group_details"];
			$datetime= $row["datetime"];
        }
    } else {
        echo "0 results";
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
						<strong>商品介紹</strong>
					</a>

				</header>

				<!-- Section -->
				<section>
					<div class="posts">
						<article>
						<a class="image"><img src="data:image/png;base64,<?=base64_encode($group_image)?>"/></a>
							<h3>商品名稱<?=$group_name ?></h3>
							<p>$<?=$group_price ?></p>
							<p>團主：<?=$group_item_order ?></p>
							<p>分類：<?=$group_class ?></p>
							<p>結單日：<?=$datetime ?></p>
							<p>成團數量：<?=$group_qu ?>/<?=$group_qu_all ?></p>
							<p>商品說明:<?=$group_details ?></p>
							<ul class="actions">
								<li>
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">追蹤商品</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">追蹤團主</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">私訊團主</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">加入團購</a>
								</li>
							</ul>
						</article>
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