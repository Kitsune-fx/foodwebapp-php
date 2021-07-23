<?php
require_once("config.php") ;
session_start();

require_once('auth.php');

$sql = "SELECT * FROM `food` WHERE food_id = ".$_GET['id']." " ;
$ans = $conn->query($sql) ;
$rows = $ans->fetch_assoc() ;

if($rows['food_status'] == 0){
    echo "<script>
    
    alert('สินค้าหมด') ;
    location.replace('food.php') ;
    
    </script>";
}
else{
    $sql_add ="INSERT INTO `enroll` (`order_id`, `mem_id`, `food_id`, `order_sta_id`) VALUES (NULL, '".$_SESSION['mem_id']."', '".$rows['food_id']."', '1');" ;
    
    if($conn->query($sql_add) === true){
        echo "<script>
        
        alert('สั่งซื้อสำเร็จ') ;
        location.replace('food.php') ;
        
        </script>" ;
    }
        else{
            alert('สั่งซื้อล้มเหลว') ;
            location.replace('food.php') ;
        }
    }




?>

