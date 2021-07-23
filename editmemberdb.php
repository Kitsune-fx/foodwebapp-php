<?php
require_once('config.php') ;
  
$sql = "UPDATE `member` SET `mem_name` = '".$_POST['mem_name']."', `mem_surname` = '".$_POST['mem_surname']."', `title_id` = '".$_POST['title_id']."', `mem_address` = '".$_POST['mem_address']."', `mem_tel` = '".$_POST['mem_tel']."', `mem_email` = '".$_POST['mem_email']."', `permi_id` = '".$_POST['mem_permi']."' WHERE `member`.`mem_id` = ".$_POST['mem_id'].";"  ;
    
if( $conn->query($sql) === true) {
    echo "<script>
     alert('แก้ไขสำเร็จ');
     location.replace('memberlist.php');
    </script>" ;
}  
else{
    echo "<script>
     alert('แก้ไขล้มเหลว') ;
     location.replace('memberlist.php') ;
    </script>" ; 
}
?>    