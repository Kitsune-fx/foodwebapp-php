<?php
require_once('config.php') ;
  
$sql = "DELETE FROM `member` WHERE `member`.`mem_id` = ".$_GET['id'].";" ;
    
if( $conn->query($sql) === true) {
    echo "<script>
     alert('ลบสำเร็จ');
     location.replace('memberlist.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('ลบล้มเหลว') ;
     location.replace('memberlist.php') ;
    </script>" ; 
}
?>    