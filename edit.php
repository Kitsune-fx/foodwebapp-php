<?php
include("config.php") ;
session_start();

$sql = "SELECT * FROM `title`" ;
$ans_title = $conn->query($sql) ;

 if($_SESSION['mem_user'] == ""){
     echo "<script> alert('กรุณาเข้าสู่ระบบ') ; window.location.href='index.php' ; </script>" ;
 }
else {
    
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
             <a href="main.php" class="btn btn-warning">เมนูหลัก</a>
             <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
            
            </span>
            </div>
            
            
        <br><br><br><br><br><br>
            
            <legend> <span style="text-align:left;font-size:32px;">
                <div class="container">
                    แก้ไขข้อมูล  
                </div>
            </span></legend>
             <div class="container" style="font-size:25px;">
                 <form action="editdb.php" method="post"> 
   
                     <?php
                     //data member
                      $sql_form = "SELECT * FROM `member` WHERE `mem_username` LIKE '".$_SESSION['mem_user']."'" ;
                      $ans_form = $conn->query($sql_form) ;
                      $rows_form = $ans_form->fetch_array(MYSQLI_ASSOC) ;
                     
                     ?>
                     
                 <br> คำนำหน้า:  <select name="title_id">
                           
                        <?php
                      while($rows_title = $ans_title->fetch_array(MYSQLI_ASSOC) ) {
                          if($rows_title['title_id'] == $rows_form['title_id']){
                              echo "<option value='".$rows_title['title_id']."' selected>".$rows_title['title_name']."</option>  " ;
                          }
                          
                          else{
                              echo "<option value='".$rows_title['title_id']."'> " .$rows_title['title_name']."</option>" ;
                          }
                      }

                     ?>
                 
                 </select>
                 <br><br>
                   Username: <input type="text" class="form-control" style="width:50%;" name="mem_user" value="<?php 
                     echo $rows_form['mem_username']; ?>" readonly  ><br>
                   Firstname :<input type="text" class="form-control" style="width:50%;" name="mem_nm" maxlength="20"
                    value="<?php echo $rows_form['mem_name']?>"><br>
                   Surname : <input type="text" class="form-control" style="width:50%;" name="mem_surnm" maxlength="20" value="<?php echo $rows_form['mem_surname']?>"><br>
                   Address : <input type="text" class="form-control" style="width:50%;" name="mem_address" maxlength="40" value="<?php echo $rows_form['mem_address']?>"><br>
                   Tel : <input type="text" class="form-control" style="width:50%;" name="mem_tel" maxlength="10"
                   value="<?php echo $rows_form['mem_tel']?>"><br>
                   Email : <input type="text" class="form-control" style="width:50%;" name="mem_email" maxlength="30"
                   value="<?php echo $rows_form['mem_email']?>"><br>
                    <input type="submit" class="btn btn-success" value="แก้ไข">
                    <a href="main.php" class="btn btn-danger">กลับสู่เมนูหลัก</a>
                   </form>
                 </div>
                <br><br><br>
         
            
     <center style="font-size:27px;">
                
            </center>    
            
          
            
    </body>
    
    
    
</html>

