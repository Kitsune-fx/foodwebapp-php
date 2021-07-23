<?php

require_once('config.php') ;
$sql = " INSERT INTO `food_catergory` (`food_cat_id`, `food_cat_name`) VALUES (NULL, '".$_POST['cat_name']."'); " ;
if( $conn->query($sql) === true){
    echo "<script>
    
    alert('เพิ่มข้อมูลสำเร็จ') ;
    location.replace('cat.php') ;
    
    </script>" ;
}
else{
   echo "<script>
    
    alert('เพิ่มข้อมูลล้มเหลว') ;
    location.replace('cat.php') ;
    
    </script>" ;
}

?>