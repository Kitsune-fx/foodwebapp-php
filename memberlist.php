<?php
require_once("config.php") ;
session_start();

require_once('authadmin.php');


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
                แก้ไขสมาชิก
                </div>
            </span>
       
            <center>
                <div class="coantainer" style="font-size:23px;width:80%;">

                    <br><br>
                    
             <div class="container" style="font-size:21px;">
                 <form action="memberlist.php" method="post">
                    ค้นหา:<input type="text" style="width:30%;" name="search" placeholder="ชื่อผู้ใช้">
                         <input type="submit" class="btn btn-success">   
                            
                 </form>
                 <br><br>
                 <center>
                 <table class="table table-bordered">
                  <tr>
                     <th>ลำดับ</th>
                     <th>ชื่อผู้ใช้</th>
                     <th>คำนำหน้า</th>
                     <th>ชื่อจริง</th>
                     <th>นามสกุล</th>
                     <th>สถานะ</th>
                     <th>แก้ไข</th>
                     <th>ลบ</th>  
                </tr>
                 
                 <?php 
                     
                     $i = 1 ;
                     if($search == ""){
                         $sql = "SELECT * FROM `member` INNER JOIN permit ON member.permi_id = permit.permi_id INNER JOIN title ON member.title_id = title.title_id ORDER BY `member`.`mem_id` ASC" ;
                         $ans = $conn->query($sql) ;
                     }
                     else{
                         $sql = "SELECT * FROM `member` INNER JOIN permit ON member.permi_id = permit.permi_id INNER JOIN title ON member.title_id = title.title_id WHERE `mem_username` LIKE '%".$search."%'" ;
                         $ans = $conn->query($sql) ;
                     }
                     
                     while($rows= $ans->fetch_assoc()) {
                         
                         echo "<tr><td>".$i."</td> <td>".$rows['mem_username']."</td> <td>".$rows['title_name']."</td> <td>".$rows['mem_name']."</td><td>".$rows['mem_surname']."</td> <td>".$rows['permi_name']."</td> </td> <td><a href='editmember.php?id=".$rows['mem_id']."'> <span style='float:center;' class='btn btn-warning'>แก้ไข </span> </a></td> <td> <a href='delmem.php?id=".$rows['mem_id']." ' onclick='return userconfirm()'> <span style='float:center;' class='btn btn-danger' >  ลบ </a> </span> </td> </tr>" ;
                         
                      
                         $i = $i+1;
                     }

                     ?>
 
                 
                 </table>
                    </center>

                 
                    <br><br>
       
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

