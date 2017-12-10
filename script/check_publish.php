<?php
    require('check_database_another.php');
    session_start();

    $item = $_POST["item"];

    if(empty($_SESSION["Username"])){
        echo '<h1>未登入 請重新登入</h1><br/>';
        echo '<h1>三秒後跳轉頁面</h1>';
        header("refresh:3;url=../view/login.php");
    }

    if($item=="good"){
       
        if($_POST["good_name"]!=''){
            if($_POST["good_class"]!='未選擇'){
                if($_POST["good_class_item"]!='未選擇'){
                   if(is_numeric($_POST["good_price"])){
                     // echo ' 都沒有神麼問題';
                    // echo $title = "刊登一般商品";
                        $tmpname = $_FILES["good_image"]["tmp_name"];
                    
                      $instr = fopen($tmpname,"rb" );
                      $file = addslashes(fread($instr,filesize($tmpname)));
                      $good_image = $file;
  
                      $good_name = $_POST["good_name"];
                      //$good_image = $_POST["good_image"];
                      $good_order = $_SESSION["Username"];
                      $good_price = $_POST["good_price"];
                      $good_class_number = $_POST["good_class"];
                      $good_class_item = $_POST["good_class_item"];
                      $good_details = $_POST["good_details"];
                      $good_way = "面交";
                      $good_stat = 1;
                      $sql_first = "SELECT A.menu_name FROM menu A WHERE A.id='$good_class_number'";
                      
                      $result_first = $conn->query($sql_first);
                      if (mysqli_num_rows($result_first) > 0) {
                          
                          while($row = mysqli_fetch_assoc($result_first)) {
                              $good_class= $row["menu_name"];
                          }
                      }
  
                      $sql = "INSERT INTO `good`(good_image,good_name,good_order,good_price,good_stat,good_class,good_class_number,good_class_item,good_way,good_details)
                      Values('$good_image','$good_name','$good_order','$good_price','$good_stat','$good_class','$good_class_number','$good_class_item','$good_way','$good_details')";
                      $result = $conn->query($sql);
                      echo '<h1>輸入商品成功</h1><br/>';
                      echo '<h1>三秒後跳轉頁面</h1>';
          
                      header("refresh:3;url=../index.php");
                   }else{
                    echo "<script>alert('商品金額請輸入數字');history.back();</script>";
                   }

                }else{
                    echo "<script>alert('沒有輸入商品小分類!');history.back();</script>";
                }
            }else{
                echo "<script>alert('沒有輸入商品大分類!');history.back();</script>";
            }
        }else{
            echo "<script>alert('沒有輸入商品名稱!');history.back();</script>";
        }
        
        // $sql = "INSERT INTO `user`(Username,Email,Password)Values('$Username','$Email','$Password')";


    }if($item=="wish_good"){

        if($_POST["good_name"]!=''){
            if($_POST["good_class"]!='未選擇'){
                if($_POST["good_class_item"]!='未選擇'){
                   if(is_numeric($_POST["good_low_price"])&&(is_numeric($_POST["good_high_price"]))){
                     // echo ' 都沒有神麼問題';
                    // echo $title = "刊登一般商品";
                        $tmpname = $_FILES["good_image"]["tmp_name"];
                    
                      $instr = fopen($tmpname,"rb" );
                      $file = addslashes(fread($instr,filesize($tmpname)));

                      $good_image = $file;
  
                      $good_name = $_POST["good_name"];
                      //$good_image = $_POST["good_image"];
                      $good_item_order = $_SESSION["Username"];

                      $good_low_price = $_POST["good_low_price"];
                      $good_high_price = $_POST["good_high_price"];
                      $good_class_number = $_POST["good_class"];
                      $good_class_item = $_POST["good_class_item"];
                      $good_details = $_POST["good_details"];
                     
                      
                      $sql_first = "SELECT A.menu_name FROM wish_menu A WHERE A.id='$good_class_number'";
                      
                      $result_first = $conn->query($sql_first);
                      if (mysqli_num_rows($result_first) > 0) {
                          
                          while($row = mysqli_fetch_assoc($result_first)) {
                              $good_class= $row["menu_name"];
                          }
                      }
  
                      $sql = "INSERT INTO `wish_good`(good_image,good_name,good_item_order,good_low_price,good_high_price,good_class,good_class_number,good_class_item,good_details)
                      Values('$good_image','$good_name','$good_item_order','$good_low_price','$good_high_price','$good_class','$good_class_number','$good_class_item','$good_details')";
                       $result = $conn->query($sql);
                      echo '<h1>輸入商品成功</h1><br/>';
                      echo '<h1>三秒後跳轉頁面</h1>';
          
                      header("refresh:3;url=../index.php");
                    echo $result;
                   }else{
                    echo "<script>alert('商品金額請輸入數字');history.back();</script>";
                   }

                }else{
                    echo "<script>alert('沒有輸入商品小分類!');history.back();</script>";
                }
            }else{
                echo "<script>alert('沒有輸入商品大分類!');history.back();</script>";
            }
        }else{
            echo "<script>alert('沒有輸入商品名稱!');history.back();</script>";
        }
    }if($item=="group_good"){
        $title = "刊登團購商品";
    }
    //echo $title ;


    // $Email = $_POST["Email"];
    // $Password = $_POST["Password"];

    // $sql = "SELECT A.`Email`,A.`Username`,A.`Password` FROM `user` A 
    // WHERE A.Email='$Email' AND A.Password='$Password'";

    // $result = $conn->query($sql);
    // mysqli_close($conn);
    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $Username= $row["Username"];
    //         echo '<h1>歡迎登入,'.$Username.'</h1><br/>';
    //         echo '<h1>三秒後跳轉頁面</h1>';

    //         session_start();
    //         $_SESSION["Username"] = $Username;
    //         usleep(3);
    //         header("refresh:3;url=../index.php");
    //     }
    // }else{
    //     echo '輸入帳號密碼錯誤<br/>';
    //     echo '<h1>三秒後跳轉頁面</h1>';
    //     usleep(3);
    //     header("refresh:3;url=../view/login.php");
    // }

 
   
    
?>