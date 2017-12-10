<?php
    
    require('check_database_another.php');

     session_start();
     if(isset($_SESSION["Username"])){
        $Username = $_SESSION["Username"];
        $good_num = $_GET["good_num"];
            
        $sql_test = "SELECT A.Username,A.good_num FROM shop_car A WHERE A.good_num='$good_num'";
        $result_test = $conn->query($sql_test);

        if (mysqli_num_rows($result_test) > 0) {
            echo "<script>alert('你已經加入購入車!');history.back();</script>";
        }else{
            $sql = "INSERT INTO `shop_car`(Username,good_num)Values('$Username','$good_num')";
            echo '<h1> 成功放入購物車</h1><br/>';
            echo '<h1>三秒後跳轉頁面</h1>';
            $result = $conn->query($sql);
            mysqli_close($conn);
            header("refresh:3;url=../allgoods.php");
        }

    }else{
        echo '<h1>未登入 請重新登入</h1><br/>';
        echo '<h1>三秒後跳轉頁面</h1>';
        header("refresh:3;url=../view/login.php");
     }

    
?>