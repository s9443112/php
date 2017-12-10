<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>購物車</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="static/interface/assets/css/shoppingcar.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

</head>
<?php
   require('script/check_database.php');

	 session_start();

	 if(isset($_SESSION["Username"])){
		$Username = $_SESSION["Username"];
		$sql = "SELECT A.`Username`,A.`good_num`,B.good_name,B.good_image,B.good_price FROM `shop_car` A,good B WHERE A.good_num=B.good_num";
		
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
					<strong>購物車</strong>
				</header>

				<!-- Section -->
				<section>
					<div class="posts">
						<article>
							<table width=100%>
							<?php

							$allprice = 0;
							if (mysqli_num_rows($result) > 0) {
								
								while($row = mysqli_fetch_assoc($result)) {
									$good_num= $row["good_num"];
									$good_name= $row["good_name"];
									$good_image= $row["good_image"];
									$good_price = $row["good_price"];
									$allprice = $allprice+$good_price;
									echo '<tr>';

									echo '<td align="left">';
									echo'<a href="allgoodspage.php?good_num='.$good_num.'" class="image">';
									?>
									<img src="data:image/png;base64,<?=base64_encode($good_image)?>"/>
									<?php
									echo'</a>';
									echo '		<strong>商品名稱 : '.$good_name.'</strong>';
									echo '		<br>';
									echo '		<strong>商品金額 : $'.$good_price.'</strong>';
									echo '		<div class="container">';

									echo '			<div class="container">';
									echo '				<div class="left">&nbsp;&nbsp;數量&nbsp;';
									echo '					<a href="#" class="button" style="padding-right: 1em;padding-left: 1em;">-</a>';
									echo '				</div>';
									echo '				<div class="middle" style="float:left;width: 30%;margin-left: 3%;margin-right: 3%;">';
									echo '					<input type="text" name="input" maxlength="30%" value="1" style="/* width:30%; */height: 42px;text-align: center;">';
									echo '				</div>';
									echo '				<div class="right" style="float:left">';
									echo '					<a href="#" class="button" style="/* width:20%; */padding-right: 1em;padding-left: 1em;">+</a>';
									echo '				</div>';
									echo '           </div>';
											
									echo '		</div>';

									echo '	</td>';
										

									echo '</tr>';
								}
							}else{
								echo "0 results";
							}
								
							 ?>
							 
							</table>

							<p>總金額:<?=$allprice?></p>
							<hr>
							<ul class="actions">
								<li>
									<a href="#" class="button">繼續選購</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="#" class="button">付款方式</a>
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