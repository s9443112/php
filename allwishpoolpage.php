<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>許願池商品介面</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="static/interface/assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<?php   
  require('script/check_database.php');
    $number = $_GET["good_num"];
  

    session_start();
	$sql = "SELECT `good_num`,`good_image`,`good_name`,`good_item_order`,`good_high_price`,`good_low_price`,`good_class`,`good_class_number`,`good_class_item`,`good_details` 
	FROM `wish_good` WHERE `good_num`=$number ";
	
  
	$result = $conn->query($sql);
	mysqli_close($conn);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
			$good_num= $row["good_num"];
			$good_image= $row["good_image"];
			$good_name= $row["good_name"];			
			$good_item_order = $row["good_item_order"];
			$good_high_price= $row["good_high_price"];
			$good_low_price= $row["good_low_price"];
			$good_class= $row["good_class"];
			$good_class_number= $row["good_class_number"];
			$good_class_item= $row["good_class_item"];
			$good_details= $row["good_details"];

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
						<a class="image"><img src="data:image/png;base64,<?=base64_encode($good_image)?>"/></a>
							<h3>商品名稱 : <?=$good_name ?></h3>
							<p>價格接受範圍 : $<?=$good_low_price ?> ~ $<?=$good_high_price ?></p>
							<p>買家：<?=$good_item_order ?></p>
							<p>分類：<?=$good_class ?></p>
							
							<p>商品說明 : <?=$good_details ?></p>
							<ul class="actions">
								<li>
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">追蹤商品</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">追蹤買家</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">私訊買家</a>&nbsp;&nbsp;&nbsp;
									<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">我要賣</a>
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
				<?php include 'template/wish_menu.php'; ?>
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