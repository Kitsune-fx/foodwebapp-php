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
               เพิ่มประเภท <br>
                   <div style="float:left;width:-50%;">
             <a href="foodadmin.php" class="btn btn-default">กลับ</a>
            </div>  
                    <br>
                <div class="container" style="font-size:23px;width:50%;">
                    <form action="addfooddb.php" method="post" onsubmit="return userconfirm()">
                    
                        <input type="text" placeholder="ชื่ออาหาร" class="form-control" name="food_name" required>
                        <input type="text" placeholder="ราคา" class="form-control" name="food_price" required>
                        <br>ประเภท:<select name="food_cat_id">
                           
               <?php
                        $sql = "SELECT * FROM `food_catergory`" ;
                        $ans = $conn->query($sql) ;
                        while($rows= $ans->fetch_assoc()){
                            echo "<option value='".$rows['food_cat_id']."'> ".$rows['food_cat_name']."</option>" ;
                    }
              ?>
                        </select>  
                        
  <br><br>
                        <input type="submit" class="btn btn-success" value="เพิ่ม">
                        <input type="reset" class="btn btn-danger" value="รีเซต">
                    </form>
                 </div>   
                </div>
            </span>
         <br>
           
            <br>
            
     <center style="font-size:27px;">
                
            </center>    
            
          
      <script>
          function userconfirm(){
              var go = false;
              
              if(confirm("ยืนยันการเพิ่มอาหาร")){
                  go = true;
              }
              return go;
          }
      </script>      
</body>
</html>

