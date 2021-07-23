<?php
require_once('config.php') ;
  
$sql = "DELETE FROM `food` WHERE `food`.`food_id` =  ".$_GET['id']."; " ;
    
if( $conn->query($sql) === true) {
    echo "<script>
     alert('ลบสำเร็จ');
     location.replace('foodadmin.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('ลบล้มเหลว') ;
     location.replace('foodadmin.php') ;
    </script>" ; 
}
?>    