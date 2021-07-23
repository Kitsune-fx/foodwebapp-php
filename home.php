<?php
include("config.php") ;
session_start();


    //login
    $sql_log = "SELECT * FROM `member` WHERE `mem_username` LIKE '".$_POST['mem_user']."' AND `mem_pwd` LIKE '".$_POST['mem_pwd']."'" ;
    $ans_log = $conn->query($sql_log) ;

    if($ans_log->num_rows>0) {
        
        $rows = $ans_log->fetch_array(MYSQLI_ASSOC) ;
        $_SESSION['mem_user'] = $rows['mem_username'] ;
        $_SESSION['mem_name'] = $rows['mem_name'] ;
        $_SESSION['mem_surname'] = $rows['$mem_surname'] ;
        $_SESSION['mem_address'] = $rows['mem_address'] ;
        $_SESSION['mem_tel'] = $rows['mem_tel'] ;
        $_SESSION['mem_email'] = $rows['mem_email'] ;
        $_SESSION['mem_pwd'] = $rows['mem_pwd'] ;
        $_SESSION['permi_id'] = $rows['permi_id'] ;
        $_SESSION['title_id'] = $rows['title_id'] ;
        //session start
    
    if($_SESSION['permi_id'] > 0){ //admin
        $msg = "เข้าสู่ระบบสำเร็จ" ;
        $mss = "ADMIN" ;
        $msr = "<a href ='mainadmin.php' class='btn btn-success'>ดำเนินการต่อ</a> " ;
    }
        else{
            $msg = "ยินดีต้อนรับ" ;
            $mss = "สมาชิก" ;
            $msr = "<a href ='main.php' class='btn btn-success'>ดำเนินการต่อ</a> " ;
            
        }
        
    }
    else{
       $msg = "Username หรือ Password ผิด" ;   
       $mss = "<a href='index.php' class='btn btn-warning'>กลับสู่เมนูหลัก</a>" ;
       $msr = "<a href='index.php' class='btn btn-warning'>กลับสู่เมนูหลัก</a>" ;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>ร้านหน้าปากซอย</title>
        <style>
            
            .logo {
                float:left;
                color:white;
                font-size:26px;
                cursor:pointer;
                text-decoration: none;
                
            }
                   .logo:hover {
                float:left;
                color:white;
                font-size:26px;
                cursor:pointer;
                text-decoration: none;
                
            }
            
            .header{
                width: 100%;
                top: 0;
                position: fixed;
                padding: 1em;
                margin-top: 0;
                text-align: right;
                background-color: black;
            }

            
            footer {
                 background-color:darkslateblue ;
                 padding: 1em;
                 width: 100%;
                 bottom: 0;
                 margin-bottom: 0 ;
                 position: fixed ;
                 text-align: center ;
            }
        </style>
    </head>
    
        <body>
            <div class="header">
                
              <a href="index.php" class="logo">
            FOODWEB
                </a>
           
             <span style="float:right;">
                 
            </span>
            </div>
            
            
        <br><br><br><br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;">
                <div class="container">
                <?php
                    echo $msg ;
                    echo "<br>" . $msr ;
                    ?>
                </div>
            </span>  
            
          
            
    </body>
    
    
    
</html>
