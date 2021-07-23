<?php
require_once("config.php") ;
session_start();

require_once('auth.php');


//checksearch
$search = "" ;
if(isset($_POST['search'])){
    $search = $_POST['search'] ;
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
                
              <a href="main.php" class="logo">
            FOODWEB
                </a>
           
             <span style="float:right;">
             <a href="main.php" class="btn btn-warning">เมนูหลัก</a>
             <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
            
            </span>
            </div>
            
            
        <br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;">
                <div class="container">
                เมนูอาหาร
                </div>
            </span>
       
            <center>
                <div class="coantainer" style="font-size:23px;width:80%;">
           
                    <br><br>
                    
             <div class="container" style="font-size:21px;">
                 <form action="food.php" method="post">
                    ค้นหา:<input type="text" style="width:30%;" name="search" placeholder="ชื่ออาหาร">
                         <input type="submit" class="btn btn-success">   
                            
                 </form>
                    <br><br>
            
                        <table class="table table-bordered">   
                    
                             <tr>
                            <th>ลำดับ</th>
                            <th>ชื่ออาหาร</th>
                            <th>ประเภท</th>
                            <th>ราคา</th>
                            <th>สถานะ</th>
                            <th>ซื้อ</th>
                            
                        </tr>
                            
                            
                            
                            
                        <?php
                    
                  if($search == "") {
                    $sql = "SELECT * FROM `food` INNER JOIN food_catergory ON food.food_catergory = food_catergory.food_cat_id INNER JOIN status ON status.food_status = food.food_status ORDER BY `food`.`food_status` DESC" ;
                      }
                 else{
                     $sql = "SELECT * FROM `food` INNER JOIN food_catergory ON food.food_catergory = food_catergory.food_cat_id INNER JOIN status ON status.food_status = food.food_status WHERE food.food_name LIKE '%".$search."%'" ;
                 }
                 
                    $ans = $conn->query($sql) ;
                    $i = 1 ;

                    while($rows = $ans->fetch_assoc()){
                        
                        echo "<tr> <td> ".$i." </td> <td>".$rows['food_name']." <td> ".$rows['food_cat_name']." </td>  <td>".$rows['food_price']."</td> <td>".$rows['status_name']."</td> <td><a href='buyfood.php?id=".$rows['food_id']."'>
                        
                        <span style='float:center;' class='btn btn-success'>ซื้อ </span> </a></td> </tr>";
                            
                        
                        /* echo  "<li class='list-group-item' style='text-align:left;' > ".$i.")  ชื่ออาหาร: ".$rows['food_name']. "   ประเภท: ".$rows['food_cat_name']." ราคา:  ".$rows['food_price'].     " บาท   สถานะ:  ".$rows['status_name']." ".  "<a href='editfood.php?id=".$rows['food_id']."'> <span style='float:right;' class='btn btn-warning'>แก้ไข </span> </a>
                        <a href='delfood.php?id=".$rows['food_id']." ' onclick='return userconfirm()'> <span style='float:right;' class='btn btn-danger' >  ลบ </a> </span> </li>   "    ; */
                        $i = $i+1;
                        }  
                      
                    ?>
                       </table>     
                        </div> 
                    </div>  
                </center>
            
            <script>
                function userconfirm(){
                var go = false;
              
                if(confirm("ยืนยันการลบ")){
                    go = true;
                }
                return go;
            }
         
            </script>
            
            
    </body>
</html>

