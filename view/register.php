<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<?php session_start(); ?>

	<title>Register</title>
	<link href="../static/login/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="App Sign in Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"
	    ./>
	
	
	<!--webfonts-->
	
	<style type="text/css">
		body,
		td,
		th {
			font-family: "微軟正黑體 Light";
		}

		a {
			font-family: "微軟正黑體 Light";
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "微軟正黑體 Light";
		}

		h1 {
			font-size: 120%;
		}
	</style>
	<!--//webfonts-->
</head>

<body>
	<h1>註冊</h1>
	<div class="app-cam">
		<div class="cam">
			<img src="../static/login/images/YunTech800.png" class="img-responsive" alt="" />
		</div>


		<form action="register 000.php" method="post">

			<input name="Username" type="text" class="text" id="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}"
			    value="Username">

			<div style="font-size: 90%; text-align: right; font-family: '微軟正黑體 Light';">
				<br>

				<input name="Email" type="text" class="text" id="Email"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address';}"
				    value="Email address">

				<div style="font-size: 90%; text-align: right; font-family: '微軟正黑體 Light';">
					<br>
					<input name="Password" type="password" id="Password"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"
					    value="Password">
					<br>
				</div>
				<div class="submit">
					<input type="submit" formaction="../script/check_register.php" value="註冊">
				</div>
				<div class="clear"></div>
				<div class="buttons">
					<ul>
						<li></li>
						<li></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="new">
					<p>
						<a href="#">學校信箱</a>
					</p>
					<p class="sign">
						<a href="#"> 聯絡客服</a>
					</p>
					<div class="clear"></div>
				</div>
		</form>
		</div>
		<!--start-copyright-->
		<div class="copy-right">
			<p>&nbsp;</p>
		</div>
		<!--//end-copyright-->





</body>

</html>