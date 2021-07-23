<?php
include("config.php") ;
$sql = "SELECT * FROM `title`" ;
$ans = $conn->query($sql) ;
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
            
            
        <br><br><br><br><br><br><br>
           <legend> <span style="text-align:left;font-size:32px;">
                <div class="container">
                    สมัครสมาชิก  
                </div>
            </span></legend>
             <div class="container" style="font-size:25px;">
                 <form action="regdb.php" method="post">  
                 <br> คำนำหน้า:  <select name="title_id">
                           
                        <?php
                        while($rows= $ans->fetch_array(MYSQLI_ASSOC)){
                            echo "<option value='".$rows['title_id']."'> ".$rows['title_name']."</option>" ;
                        }
                 ?>
                 
                 </select>
                 <br><br>
                   Username: <input type="text" class="form-control" style="width:50%;" name="mem_user" maxlength="20" required placeholder="sample" minlength="3"><br>
                   Password : <input type="text" class="form-control" style="width:50%;" name="mem_pwd" maxlength="20" minlength="8" required placeholder="8-20ตัว"><br>
                   Firstname :<input type="text" class="form-control" style="width:50%;" name="mem_nm" maxlength="20"
                    required placeholder="กานต์"><br>
                   Surname : <input type="text" class="form-control" style="width:50%;" name="mem_surnm" maxlength="20" placeholder="เกตุภาค"><br>
                   Address : <input type="text" class="form-control" style="width:50%;" name="mem_address" maxlength="40" placeholder="101/ ม.4 ต.ลี้ จ.ลำพูน"><br>
                   Tel : <input type="text" class="form-control" style="width:50%;" name="mem_tel" maxlength="10"
                    minlength="10" maxlength="10" required placeholder="0850342946"><br>
                   Email : <input type="email" class="form-control" style="width:50%;" name="mem_email" maxlength="50" required placeholder="sample@gmail.com"><br>
                    <input type="submit" class="btn btn-success" value="สมัครสมาชิก">
                    <a href="index.php" class="btn btn-danger">กลับสู่เมนูหลัก</a>
                   </form>
                 </div>
                <br><br><br>
            
    </body>
    
    
    
</html>
