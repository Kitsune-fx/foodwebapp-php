<?php
include("config.php") ;
session_start() ;

if($_POST['mem_user'] == $_SESSION['mem_user']) {
    $sql = "UPDATE `member` SET `mem_username` = '".$_POST['mem_user']."', `mem_name` = '".$_POST['mem_nm']."', `mem_surname` = '".$_POST['mem_surnm']."', `title_id` = '".$_POST['title_id']."', `mem_address` = '".$_POST['mem_address']."', `mem_tel` = '".$_POST['mem_tel']."', `mem_email` = '".$_POST['mem_email']."' WHERE `member`.`mem_username` = '".$_SESSION['mem_user']."';" ;
    
    if($conn->query($sql) == true){
        $msg = "แก้ไขข้อมูลสำเร็จ" ;
    }
    else {
        $msg = "แก้ไขข้อมูลล้มเหลว" ;
    }
}
    else {
        $msg = "แก้ไขข้อมูลล้มเหลว" ;
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
             <a href="login.php" class="btn btn-warning">ออกจากระบบ</a>
            </span>
            </div>
            
            
        <br><br><br><br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;color:black;">
                <div class="container">
     
                    <?php 
         echo $msg ; ?>
         <br>
            <a href="main.php" class="btn btn-success">กลับสู่เมนูหลัก</a>
                </div>
            </span>
         
            

          
            
    </body>
    
    
    
</html>
