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
                    
                    <form action="editfooddb.php" method="post" onsubmit="return userconfirm()">
                        
                        <?php
                        //datafood
                        $sql = "SELECT * FROM `food` INNER JOIN food_catergory ON food.food_catergory = food_catergory.food_cat_id INNER JOIN status ON status.food_status = food.food_status WHERE `food_id` = ".$_GET['id']."" ;
                        $ans = $conn->query($sql) ;
                        $rows = $ans->fetch_assoc() ;
                        ?>
                    
                        <input type="text" value="<?php echo $rows['food_name'] ;?>" class="form-control" name="food_name">
                        <input type="text" value="<?php echo $rows['food_price'] ;?>" class="form-control" name="food_price">
                        <input type="hidden" name="food_id" value="<?php echo $rows['food_id'] ;?>">
                        <br>
                        
                        
                        ประเภท:<select name="food_cat_id">
                        <?php
                        $sql_cat = "SELECT * FROM `food_catergory`" ;
                        $ans_cat = $conn->query($sql_cat) ;
                        while($rows_cat= $ans_cat->fetch_assoc()){
                             if($rows_cat['food_cat_id'] == $rows['food_catergory']){
                              echo "<option value='".$rows_cat['food_cat_id']."' selected>".$rows_cat['food_cat_name']."</option>  " ; 
                          }
                          
                          else{
                              echo "<option value='".$rows_cat['food_cat_id']."' >".$rows_cat['food_cat_name']."</option>  " ; 
                          }
                    }
              ?>
                        </select>  
                        
                        
                       
                        <br>
                        สถานะ: <select name="food_status"> 
                        <?php
                        $sql_sta = "SELECT * FROM `status`" ;
                        $ans_sta = $conn->query($sql_sta) ;
                        while($rows_sta= $ans_sta->fetch_assoc()){
                            if($rows_sta['food_status'] == $rows['food_status']){
                              echo "<option value='".$rows_sta['food_status']."' selected>".$rows_sta['status_name']."</option>  " ; 
                          }
                          
                          else{
                              echo "<option value='".$rows_sta['food_status']."'>".$rows_sta['status_name']."</option>  " ; 
                          };
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
              
              if(confirm("แก้ไขอาหาร")){
                  go = true;
              }
              return go;
          }
      </script>      
</body>
</html>

