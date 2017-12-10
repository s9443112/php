<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php   
   require('script/check_database.php');
    $number = $_GET["good_num"];

    session_start();

    $sql = "SELECT `good_num`,`good_image`,`good_name`,`good_order`,`good_price`,`good_stat`,`good_class`,`good_way`,`good_details` FROM `good` WHERE `good_num`= $number ";
        
    $result = $conn->query($sql);
    mysqli_close($conn);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            $good_num= $row["good_num"];
            $good_image= $row["good_image"];
            $good_name= $row["good_name"];
            $good_order= $row["good_order"];
            $good_price= $row["good_price"];
            $good_stat= $row["good_stat"];
            $good_class= $row["good_class"];
            $good_way= $row["good_way"];
            $good_details= $row["good_details"];
        }
    } else {
        echo "0 results";
    }
?>  

<html>
	<head>
		<title>商品介面</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="static/interface/assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div class="inner">
					<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo"><strong>商品介紹</strong> </a>
					</header>
					<section>
                        <div class="posts">
                            <article> <a class="image"><img src="data:image/png;base64,<?=base64_encode($good_image)?>"/></a>
                                <div>
                                <h3>商品名稱<?=$good_name ?>
                                </h3>
                            </div>
                                <div>
                                <p>$<?=$good_price ?></p>
                                </div>
                                <div>
                                <p>商品狀態：<?=$good_stat ?></p>
                                </div>
                                <div>
                                <p>分類：<?=$good_class ?></p>
                                </div>
                                <div>
                                <p>寄送方式：<?=$good_way ?></p>
                                </div>
                                <div>
                                <p>商品說明:：<?=$good_details ?></p>
                                </div>
                                <ul class="actions">
                                <li><a href="#" class="button">私訊賣家</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="script/add_shop_car.php?good_num=<?=$good_num ?>" class="button">加入購物車</a></li><br/>
                                <li><a href="script/trace_user.php?good_order=<?=$good_order ?>" class="button">追蹤賣家</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="button">追蹤商品</a></li>
                                </ul>
                            </article>
                        </div>
					</section>
				</div>
			</div>
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