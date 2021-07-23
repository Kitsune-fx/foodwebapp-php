<?php
require_once('config.php') ;
  
$sql = "UPDATE `food` SET `food_name` = '".$_POST['food_name']."', `food_catergory` = '".$_POST['food_cat_id']."', `food_price` = '".$_POST['food_price']."', `food_status` = '".$_POST['food_status']."' WHERE `food`.`food_id` = ".$_POST['food_id'].";" ;


if( $conn->query($sql) === true) {
    echo "<script>
     alert('แก้ไขสำเร็จ');
     location.replace('foodadmin.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('แก้ไขล้มเหลว') ;
     location.replace('foodadmin.php') ;
    </script>" ; 
}
?>    