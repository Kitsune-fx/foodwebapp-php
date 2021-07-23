<?php

if(isset($_SESSION['mem_id']) == 1) {
    //มี
    
}
else{
    echo 
        "<script>
         alert('คุณไม่มีสิทธเข้าถึง') ;
         location.replace('index.php') ;
        </script>"
        
        ;
}

?>