<?php
require_once('config.php') ;
  
$sql = "UPDATE `food_catergory` SET `food_cat_name` = '".$_POST['cat_name']."' WHERE `food_catergory`.`food_cat_id` = ".$_POST['cat_id'].";" ;
    
if( $conn->query($sql) === true) {
    echo "<script>
     alert('แก้ไขสำเร็จ');
     location.replace('cat.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('แก้ไขล้มเหลว') ;
     location.replace('cat.php') ;
    </script>" ; 
}
?>    