<?php
    require('check_database_another.php');

    $q = intval($_GET['q']);
    $item = intval($_GET['item']);
    if($item=="good"){
        $sql="SELECT * FROM menu_name WHERE menu_id = '".$q."'";
        $result = $conn->query($sql);
    }if($item=="wish_good"){
        $sql="SELECT * FROM wish_menu_name WHERE menu_id = '".$q."'";
        $result = $conn->query($sql);
    }
    
    
  
    while($row = mysqli_fetch_array($result)) {
        $menu_id = $row["menu_id"];
        $name_item = $row["name_item"];
        echo '<option value="'.$name_item.'">'.$name_item.'</option>';

     
    }
    
    mysqli_close($con);
?>