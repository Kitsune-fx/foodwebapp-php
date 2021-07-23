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
                แก้ไขประเภทอาหาร
                </div>
            </span>
       
            <center>
                <div class="coantainer" style="font-size:23px;width:80%;">
                    <a href="addcat.php" class="btn btn-success" style="float:left;">เพิ่มประเภท</a>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>ชื่อประเภท</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                        <?php
                        $sql =" SELECT * FROM `food_catergory`" ;
                        $ans = $conn->query($sql) ;
                    $i = 1 ;
                        
                        while($rows=$ans->fetch_assoc()){
                            
                            echo  "<tr><td> ".$i.")   ".$rows['food_cat_name']."</td> 
                            <td> <a href='editcat.php?id=".$rows['food_cat_id']."' class='btn btn-warning'> แก้ไข </a></td> <td> <a href='delcat.php?id=".$rows['food_cat_id']." ' onclick='return userconfirm()'> <span style='float:center;' class='btn btn-danger' >  ลบ </a> </span> </td> </tr>"  ;
                            
                            /*echo "<li class='list-group-item' style='text-align:left;'>" 
                                .$i. ")  " .$rows['food_cat_name']. "<a href='editcat.php?id=".$rows['food_cat_id']."'> <span style='float:right;' class='btn btn-warning'>แก้ไข </span> </a>
                             <a href='delcat.php?id=".$rows['food_cat_id']." ' onclick='return userconfirm()'> <span style='float:right;' class='btn btn-danger' >  ลบ </a> </span> </li> "
                                ; */
                            $i = $i+1 ;
                        }
                        
                        ?>               
       </table>
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

