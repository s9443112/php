<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>刊登</title>
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
        
        
    ?>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>刊登</strong> </a>
									
								</header>

							<!-- Section -->
								<section>
								  <a href="published_item.php?item=good">刊登一般商品</a><hr>
                                  <a href="published_item.php?item=wish_good">刊登許願池</a><hr>
                                  <a href="published_item.php?item=group_good">刊登團購商品</a><hr>
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