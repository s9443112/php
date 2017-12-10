<?php
   require('check_database_another.php');
     
     
     session_start();
     if(isset($_SESSION["Username"])){
        $Username = $_SESSION["Username"];
        $good_order = $_GET["good_order"];
        if($Username==$good_order){
            echo '<h1>不可以追蹤自己</h1><br/>';
            echo '<h1>三秒後跳轉頁面</h1>';
            echo "<script>setTimeout('history.back()',3000);</script>";
        }else{
            $sql_first = "SELECT A.`Username`,A.`Next_Username` FROM `trace` A 
            WHERE A.Next_Username='$good_order'";
            $result = $conn->query($sql_first);
            if (mysqli_num_rows($result) > 0) {
                mysqli_close($conn);
                echo '<h1>追蹤過了ㄛ</h1><br/>';
                echo '<h1>三秒後跳轉頁面</h1>';
                echo "<script>setTimeout('history.back()',3000);</script>";
            }else{
                $sql = "INSERT INTO `trace`(Username,Next_Username)Values('$Username','$good_order')";
                echo '<h1> 成功訂閱</h1><br/>';
                echo '<h1>三秒後跳轉頁面</h1>';
                $result = $conn->query($sql);
                mysqli_close($conn);
                header("refresh:3;url=../allgoods.php");
            }      
        }

        
    
    }else{
        echo '<h1>未登入 請重新登入</h1><br/>';
        echo '<h1>三秒後跳轉頁面</h1>';
        header("refresh:3;url=../view/login.php");
     }

    
?>