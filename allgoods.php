
<!DOCTYPE HTML>
<html>
	<head>
		<title>全部商品</title>
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
        
        $sql = "SELECT `good_num`,`good_image`,`good_name`,`good_price`,`good_stat`,`good_class`,`good_way`,`good_details` FROM `good`WHERE good.good_stat='1' ";
     
		$result = $conn->query($sql);
		mysqli_close($conn);
    ?>
    <body>
    	<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
								<header id="header">
									<a href="index.html" class="logo"><strong>全部商品</strong> </a>					
								</header>

								<section>
									<div class="posts">
                                    <?php
										if (mysqli_num_rows($result) > 0) {
										// output data of each row
											while($row = mysqli_fetch_assoc($result)) {
												
												$good_num= $row["good_num"];
												$good_image= $row["good_image"];
												$good_name= $row["good_name"];
												$good_price= $row["good_price"];
												$good_stat= $row["good_stat"];
												$good_class= $row["good_class"];
												$good_way= $row["good_way"];
												$good_details= $row["good_details"];
												echo $good_num;
												echo'<article>';
												echo'<a href="allgoodspage.php?good_num='.$good_num.'" class="image">';
												?>
												<img src="data:image/png;base64,<?=base64_encode($good_image)?>"/>
												<?php
												echo'</a>';
												echo'	<h3>商品名稱'.$good_name.'</h3>';
												echo'	<p>$'.$good_price.'</p>';
												echo'	<ul class="actions">';
												echo'   <li><a href="allgoodspage.php?good_num='.$good_num.'" class="button">More</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="button">Share</a></li>';
												echo'   </ul>';
												echo'	</article>	';
											}
										} else {
											echo "0 results";
										}
										
																		

																			
									?>
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