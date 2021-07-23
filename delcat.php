<?php
require_once('config.php') ;
  
$sql = "DELETE FROM `food_catergory` WHERE `food_catergory`.`food_cat_id` = ".$_GET['id']."; " ;
    
if( $conn->query($sql) === true) {
    echo "<script>
     alert('ลบสำเร็จ');
     location.replace('cat.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('ลบล้มเหลว') ;
     location.replace('cat.php') ;
    </script>" ; 
}
?>    