<?php
require_once("config.php") ;
session_start();

include('authadmin.php') ;

$sql = "SELECT * FROM `member`  WHERE member.mem_id = ".$_GET['id']." " ;
$ans = $conn->query($sql) ;
$rows = $ans->fetch_assoc() ;


 
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
            
            <legend> <span style="text-align:left;font-size:32px;">
                <div class="container">
                    แก้ไขข้อมูลของ <?php echo $rows['mem_username'] ; ?>  
                </div>
            </span></legend>
             <div class="container" style="font-size:25px;">

                 <form action="editmemberdb.php" method="post">
                  
                     <br> คำนำหน้า:  <select name="title_id">
                           
                        <?php
                     //title
                        $sql_title = "SELECT * FROM `title`" ;
                     $ans_title = $conn->query($sql_title) ;
                     
                      while($rows_title = $ans_title->fetch_array(MYSQLI_ASSOC) ) {
                          
                          if($rows_title['title_id'] == $rows['title_id']){
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
                     echo $rows['mem_username']; ?>" readonly  ><br>
                     
                   Firstname: <input type="text" class="form-control" style="width:50%;" name="mem_name" value="<?php 
                     echo $rows['mem_name']; ?>"><br>  
                     
                   Surname:   <input type="text" class="form-control" style="width:50%;" name="mem_surname" value="<?php echo $rows['mem_surname']; ?>"><br>  
                     
                   Address: <input type="text" class="form-control" style="width:50%;" name="mem_address" value="<?php echo $rows['mem_address']; ?>"><br>       
                     
                   Tel:   <input type="text" class="form-control" style="width:50%;" name="mem_tel" value="<?php echo $rows['mem_tel']; ?>"><br> 
                     
                   Email: <input type="text" class="form-control" style="width:50%;" name="mem_email" value="<?php echo $rows['mem_email']; ?>"><br>
                     
                     <input type="hidden" name="mem_id" value="<?php echo $rows['mem_id'] ; ?>">
                     
                   สถานะ:<select name="mem_permi">
                     <?php  
                     $sql_per = "SELECT * FROM `permit`" ;
                     $ans_per = $conn->query($sql_per) ;
                     while($rows_per = $ans_per->fetch_assoc()){
                         
                         if($rows_per['permi_id'] == $rows['permi_id']) {
                         
                             echo "<option value='".$rows_per['permi_id']."' selected>".$rows_per['permi_name']."</option> " ;
                             
                         }
                         else{
                            echo "<option value='".$rows_per['permi_id']."'>".$rows_per['permi_name']."</option> " ; 
                         }
                     }
                     ?>
                    </select>
                     <br>
                     <br><input type="submit" class="btn btn-success" value="แก้ไข">
                      <input type="reset" class="btn btn-default" value="รีเซต">
                     
                 </form>
                
                 </div>
                <br><br><br>
         
            
     <center style="font-size:27px;">
                
            </center>    
    </body>

</html>

