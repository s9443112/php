<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php
		require('script/check_database.php');
		session_start();
        if(empty($_SESSION["Username"])){
            echo "<script>alert('沒有登入 請重新登入!');history.back();</script>";
        }
        $item = $_GET["item"];
        if($item=="good"){
            $title = "刊登一般商品";
        }if($item=="wish_good"){
            $title = "刊登願望商品";
        }if($item=="group_good"){
            $title = "刊登團購商品";
        }
        $sql = "SELECT id,menu_name FROM menu";
        $result = $conn->query($sql);
        $sql2 = "SELECT id,menu_name FROM wish_menu";
        $result2 = $conn->query($sql2);
    ?>
	<head>
		<title><?=$title ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="static/interface/assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script>
          function showUser(str) {
            if (str=="") {
              document.getElementById("txtHint").innerHTML="";
              return;
            } 
            if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
              if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
              }
            }
            xmlhttp.open("GET","script/getuser.php?q="+str+"&&item=<?=$title?>",true);
            xmlhttp.send();
          }
        </script>
	</head>
   
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong><?=$title ?></strong> </a>
									
								</header>

							<!-- Section -->
								<section>
                                    <form action="publish_check.php" enctype="multipart/form-data">
                                        商品圖片 <input type="file" name='good_image'/><br>
                                        商品名稱:<input type="text" name="good_name" class="text" id="good_name"/><br>
                                        <?php
                                            if($item=="good"){
                                                echo "價錢:<input name='good_price' id='good_price' /><br>";

                                            }if($item=="wish_good"){
                                                echo '價錢接受範圍:<input name="good_low_price" id="good_low_price" />';
                                                echo ' ~ <input name="good_high_price" id="good_high_price" /><br>';
                                            }if($item=="group_good"){
                                                echo '價錢:<input name="group_price" id="group_price" /><br/><br/>';
                                            }
                                        ?>
                                        
                                        
                                        <?php
                                            if($item=="good"){
                                              $select_name = "good_class";
                                            }if($item=="wish_good"){
                                              $select_name = "good_class";
                                            }if($item=="group_good"){
                                              $select_name = "group_class";
                                            }
                                        ?>
                                        <?php
                                            if($item == "good"){

                                                echo '商品主分類
                                                <select name="'.$select_name.'" onchange="showUser(this.value)" id="'.$select_name.'" >';
                                                echo '<option value="">未選擇</option>';
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row["id"];
                                                    $menu_name = $row["menu_name"];
                                                    echo '<option value="'.$id.'">'.$menu_name.'</option>';
                                                }
                                                echo '</select>';
                                                echo '小分類
                                                <select name="good_class_item" id="txtHint">
                                                    <option>未選擇</option>
                                                </select><br/>';
                                            }
                                            if($item == "wish_good"){

                                                echo '商品主分類
                                                <select name="'.$select_name.'" onchange="showUser(this.value)" id="'.$select_name.'" >';
                                                echo '<option value="">未選擇</option>';
                                                while($row = mysqli_fetch_assoc($result2)) {
                                                    $id = $row["id"];
                                                    $menu_name = $row["menu_name"];
                                                    echo '<option value="'.$id.'">'.$menu_name.'</option>';
                                                }
                                                echo '</select>';
                                                echo '小分類
                                                <select name="good_class_item" id="txtHint">
                                                    <option>未選擇</option>
                                                </select><br/>';
                                            }

                                            if($item == "group_good"){
                                                echo '成團數量<input name="group_qu_all" id="group_qu_all" /><br/>';
                                            }
                                        ?>
                                        
                                        商品細節:<input type="text" name="good_details" class="text" id="good_details"/><br>

                                        <input type="hidden" name="item" value="<?=$item?>">
                                        <input type="submit" formaction="script/check_publish.php" formmethod="POST" value="送出">
        
                                       
                                    </form>
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