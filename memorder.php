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
             <a href="main.php" class="btn btn-warning">เมนูหลัก</a>
             <a href="edit.php" class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
             <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
            
            </span>
            </div>
            
            
        <br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;">
                <div class="container">  
                รายการที่สั่ง<br><br>
                </div>
            </span>
         
            
     <center style="font-size:27px;">
                 
           <div class="container">
         
               <?php
               
               $sql = "SELECT * FROM `enroll` INNER JOIN food ON food.food_id = enroll.food_id INNER JOIN order_sta ON enroll.order_sta_id = order_sta.order_sta_id WHERE enroll.mem_id = ".$_SESSION['mem_id']." ORDER BY `enroll`.`order_id` DESC " ;
               $ans = $conn->query($sql) ;
              
               $i = 1 ;
               ?>
               
               
               
               <table class="table table-bordered">
               <tr>
                   <th style="text-align:center;">ลำดับ</th>
                   <th style="text-align:center;">ชื่ออาหาร</th>
                   <th style="text-align:center;">สถานะ</th>
                   <th style="text-align:center;">พิมพ์ใบเสร็จ</th>
                   <th style="text-align:center;">ยกเลิกการสั่ง</th>
                   </tr>
               
                   
                   <?php
                    while($rows = $ans->fetch_assoc()){
                        
                        echo "<tr style='text-align:center;'><td >".$i."</td> <td>".$rows['food_name']."</td> <td>".$rows['sta_name']."</td>
                        <td><a href='bill.php?id=".$rows['order_id']."' class='btn btn-warning'>ดูใบเสร็จ</a></td> 
                         <td><a href='cancel.php?id=".$rows['order_id']."' class='btn btn-danger' onclick='return userconfirm()'>ยกเลิกรายการ</a></td></tr>
                        " ;
                        $i = $i+1;
                    }
                   ?>
                   
               </table>
         
         
         
         </div>
         
    </center>    
            <script>
                function userconfirm(){
                    var go = false ;
                if(confirm("ยืนยันการลบ")){
                    go = true ;
                }
                  return go ;   
             }
            
            
            </script> 
            
    </body>
</html>

