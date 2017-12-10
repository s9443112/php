






<?php

    
     $servername = "139.162.72.78";
     $username = "s9443112";
     $password = "game54176868";
     $dbname = "test";
     
     
     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
           
     $sql_test = "SELECT wish_menu.id, wish_menu.menu_name , GROUP_CONCAT(wish_menu_name.name_item) AS name_items FROM wish_menu LEFT JOIN wish_menu_name ON wish_menu.id = wish_menu_name.menu_id GROUP BY menu_id , IF(name_item IS NULL, id, 0) ORDER BY wish_menu.id ASC";
     
    
    
     $result_test = $conn->query($sql_test);
     mysqli_close($conn);

     if(isset($_SESSION["Username"])){
        echo'
        <nav id="登入">
        <header class="major">
            <h2>'.$_SESSION["Username"].'</h2>
        </header>
        <ul>
            <li><a href="personnel.php">帳號資訊</a></li>
            <li><a href="">帳號登出</a></li>
            <li><a href="published.php">刊登商品</a></li>          
        </ul>
        </nav>
    
    ';
     }else{
       
        echo'
        <nav id="登入">
        <header class="major">
            <h2>訪問者</h2>
        </header>
        <ul>
            <li><a href="view/login.php">登入</a></li>
            <li><a href="view/register.php">註冊</a></li>           
        </ul>
        </nav>
        ';
     }
    
    
    echo '<nav id="menu">
    <header class="major">
        <h2>Menu</h2>
    </header>
    <ul>
    ';
    echo '<li><a href="index.php">首頁</a></li>';
    if (mysqli_num_rows($result_test) > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result_test)) {
                $menu_name = $row["menu_name"];
                $id = $row["id"];
                
                echo'<li>';
                echo '<span class="opener">'.$menu_name.'</span>';
                echo '<ul>';
                
                if (isset($row["name_items"])) {

                    $name_items = explode(",",$row["name_items"]);
                   
                    foreach($name_items as $name_item){

                        echo'<li><a href="another_wishpool.php?id='.$id.'&&name_item='.$name_item.'">'.$name_item.'</a></li>';
                    }
   
                }
                echo '</ul>';
                echo '</li>';
            }
        }
    
    echo '</ul>';
    echo'</nav>';
?>