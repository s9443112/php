<?php
   require('check_database_another.php');
           

    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    $sql = "SELECT A.`Email`,A.`Username`,A.`Password` FROM `user` A 
    WHERE A.Email='$Email' AND A.Password='$Password'";

    $result = $conn->query($sql);
    mysqli_close($conn);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $Username= $row["Username"];
            echo '<h1>歡迎登入,'.$Username.'</h1><br/>';
            echo '<h1>三秒後跳轉頁面</h1>';

            session_start();
            $_SESSION["Username"] = $Username;
            usleep(3);
            header("refresh:3;url=../index.php");
        }
    }else{
        echo '輸入帳號密碼錯誤<br/>';
        echo '<h1>三秒後跳轉頁面</h1>';
        usleep(3);
        header("refresh:3;url=../view/login.php");
    }

 
   
    
?>