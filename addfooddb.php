<?php
require_once('config.php') ;
    
    
$sql = "INSERT INTO `food` (`food_id`, `food_name`, `food_catergory`, `food_price`, `food_status`) VALUES 
(NULL, '".$_POST['food_name']."', '".$_POST['food_cat_id']."', '".$_POST['food_price']."', '1');" ;

if( $conn->query($sql) === true){
    echo "<script>
    
    alert('เพิ่มข้อมูลสำเร็จ') ;
    location.replace('foodadmin.php') ;
    
    </script>" ;
}
else{
   echo "<script>
    
    alert('เพิ่มข้อมูลล้มเหลว') ;
    location.replace('foodadmin.php') ;
    
    </script>" ;
}

?>