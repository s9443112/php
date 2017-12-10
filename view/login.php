<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<html>

<head>
	<title>登入</title>
	<meta charset="utf-8" />
	<link href="../static/login/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="App Sign in Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"
	  ./>
	
</head>

<body>
	<h1>登入</h1>
	<div class="app-cam">
		<div class="cam">
			<img src="../static/login/images/YunTech800.png" class="img-responsive" alt="" />
		</div>


		<!--[3]form表格 method：傳送的方式(post 網址列無資料/get 網址列顯示資料) action：按下送出後 要將資料丟去checklogin.php處理-->
		<form>
			<p>
				<!--[4]input輸入框 設定type型態、name欄位名-->
				<input name="Email" type="text" class="text" value="Email">
			</p>
			<p>
				<label for="password"></label>
				<input name="Password" type="password" value="Password">
			</p>
			<p>
				<!--[5]送出鈕 型態為submit value為按鈕顯示的內容-->
				<input type="submit" formaction="../script/check_login.php" formmethod="POST" value="登入">
			</p>
		</form>
		<div class="submit">
			<input type="submit" class="app-cam" onClick="location.href='register.php';" value="註冊">
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
				<a href="#">傳送驗證碼</a>
			</p>
			<p class="sign">
				<a href="#"> 加入會員</a>
			</p>
			<div class="clear"></div>
		</div>

</body>

</html>