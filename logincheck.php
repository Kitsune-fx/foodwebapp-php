<?php
require_once("config.php") ;

session_start();


    //login
    $sql_log = "SELECT * FROM `member` WHERE `mem_username` LIKE '".$_POST['mem_user']."' AND `mem_pwd` LIKE '".$_POST['mem_pwd']."'" ;
    $ans_log = $conn->query($sql_log) ;

    if($ans_log->num_rows>0) {
        
        $rows = $ans_log->fetch_array(MYSQLI_ASSOC) ;
        $_SESSION['mem_id'] = $rows['mem_id'] ;
        $_SESSION['mem_code'] = $rows['mem_code'] ;
        $_SESSION['mem_user'] = $rows['mem_username'] ;
        $_SESSION['mem_name'] = $rows['mem_name'] ;
        $_SESSION['mem_surname'] = $rows['mem_surname'] ;
        $_SESSION['mem_address'] = $rows['mem_address'] ;
        $_SESSION['mem_tel'] = $rows['mem_tel'] ;
        $_SESSION['mem_email'] = $rows['mem_email'] ;
        $_SESSION['mem_pwd'] = $rows['mem_pwd'] ;
        $_SESSION['permi_id'] = $rows['permi_id'] ;
        $_SESSION['title_id'] = $rows['title_id'] ;
        //session start
    
        if($_SESSION['permi_id'] > 0){ //admin
            echo '<script>
            location.replace("mainadmin.php") ;
            </script>' ;
        }
        else{
            //$msg = "ยินดีต้อนรับ" ;
            //$mss = "สมาชิก" ;
            //$msr = "<a href ='main.php' class='btn btn-success'>ดำเนินการต่อ</a> " ;
            echo '<script>
            location.replace("main.php") ;
            </script>' ;
            
        }
        
    }
    else{
              
        echo '<script>
            alert("Username หรือ Password ผิด") ;
            location.replace("login.php") ;
        </script>' ;
    }
?>

