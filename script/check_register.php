<?php
   require('check_database_another.php');
           

    $Email = $_POST["Email"];
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    if($Email==''||$Username==''||$Password==''){
        echo '<h1>有欄位未輸入,請重新輸入</h1><br/>';
        echo '<h1>三秒後跳轉頁面</h1>';
        header("refresh:3;url=../view/register.php");
    }



    $sql = "SELECT A.`Email`,A.`Username`,A.`Password` FROM `user` A 
    WHERE A.Email='$Email'";
    $result = $conn->query($sql);
   
    mysqli_close($conn);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $Email= $row["Email"];
            echo '<h1>很遺憾, '.$Email.' 已經被註冊過了</h1><br/>';
            echo '<h1>三秒後跳轉頁面</h1>';
            header("refresh:3;url=../view/register.php");
        }
    }else{
        $sql = "INSERT INTO `user`(Username,Email,Password)Values('$Username','$Email','$Password')";
        $result = $conn->query($sql);
        mysqli_close($conn);
        echo '<h1> 註冊成功</h1><br/>';
        echo '<h1>三秒後跳轉頁面請登入</h1>';
        header("refresh:3;url=../view/login.php");
    }

 
   
    
?>