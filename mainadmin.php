<?php
require_once("config.php") ;
session_start();

require_once('authadmin.php');
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
                
              <a href="mainadmin.php" class="logo">
            FOODWEB
                </a>
           
             <span style="float:right;">
             <a href="mainadmin.php" class="btn btn-warning">เมนูหลัก</a>
             <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
            
            </span>
            </div>
            
            
        <br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;">
                <div class="container">
                เมนูแอดมิน <br>
                    <a href="foodadmin.php" class="btn btn-danger" style="font-size:25px;"> จัดการเมนูอาหาร </a>
                    <a href="memberlist.php" class="btn btn-warning" style="font-size:25px;"> จัดการข้อมูลสมาชิก </a>
                    <a href="cat.php" class="btn btn-success" style="font-size:25px;"> จัดการประเภทอาหาร </a>
                    <a href="adminorder.php" class="btn btn-primary" style="font-size:25px;">จัดการรายการอาหารที่สั่ง</a>
                </div>
            </span>
         
            
     <center style="font-size:27px;">
                
            </center>    
            
          
            
    </body>
    
    
    
</html>

