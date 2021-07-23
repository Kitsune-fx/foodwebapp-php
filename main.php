<?php
include("config.php") ;
session_start();

require_once('auth.php') ;

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
                
              <a href="main.php" class="logo">
            FOODWEB
                </a>
           
             <span style="float:right;">
             <a href="edit.php" class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
             <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
            
            </span>
            </div>
            
            
        <br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;">
                <div class="container">
                    ยินดีต้อนรับ <?php echo $_SESSION['mem_user'] ?><br>
                <a href="food.php" class="btn btn-success" style="font-size:30px;">ดูเมนูอาหาร</a>   
                <a href="memorder.php" class="btn btn-warning" style="font-size:30px;">รายการที่สั่ง</a>
                </div>
            </span>
         
            
     <center style="font-size:27px;">
                
            </center>    
            
          
            
    </body>
    
    
    
</html>

