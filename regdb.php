<?php
require_once("config.php") ;

$sql = "SELECT * FROM `member` WHERE `mem_username`= '".$_POST['mem_user']."'  " ;
$ans = $conn->query($sql) ;
$msg = "" ;
$mss = "" ;


 if($ans->num_rows > 0){
     $msg = "Username นี้ถูกใช้แล้ว" ;
     $mss = "<a href='index.php' class='btn btn-primary'>กลับสู่เมนูหลัก</a> " ;
 }

 else{
     //เพิ่มได้
     $mem_code = "" ;
         //gencodeid
         $sql = "SELECT * FROM `member` ORDER BY `member`.`mem_id` DESC" ;
         $ans_1 = $conn->query($sql) ;
         if($ans_1->num_rows == 0){
             $mem_code= "1" ;
         }
         else{
            $rows1 = $ans_1->fetch_assoc() ;
           $mem_code = intval($rows1['mem_code']) + 1 ; 
         }
     
     $insert = "INSERT INTO `member` (`mem_username`, `mem_name`, `mem_surname`, `title_id`, `mem_address`, `mem_tel`, `mem_email`, `mem_pwd`, `permi_id` , mem_code) VALUES ('".$_POST['mem_user']."', '".$_POST['mem_nm']."', '".$_POST['mem_surnm']."', '".$_POST['title_id']."', '".$_POST['mem_address']."', '".$_POST['mem_tel']."', '".$_POST['mem_email']."', '".$_POST['mem_pwd']."', '0' , '$mem_code' );" ;
     
     if($conn->query($insert) === true)
     {
         
         //login
        $_SESSION['mem_id'] = $conn->insert_id ;
        $_SESSION['mem_code'] = "" ;
         
        $_SESSION['mem_user'] = $_POST['mem_user'] ;
        $_SESSION['mem_name'] = $_POST['mem_nm'] ;
        $_SESSION['mem_surname'] = $_POST['mem_surnm'] ;
        $_SESSION['mem_address'] = $_POST['mem_address'] ;
        $_SESSION['mem_tel'] = $_POST['mem_tel'] ;
        $_SESSION['mem_email'] = $_POST['mem_email'] ;
        $_SESSION['mem_pwd'] = $_POST['mem_pwd'] ;
        $_SESSION['permi_id'] = "0" ;
        $_SESSION['title_id'] = $_POST['title_id'] ;
         
         $msg = "สมัครสมาชิกสำเร็จ" ;
        $mss = "<a href='main.php' class='btn btn-primary'>ดำเนินการต่อ</a>" ;
    }
    else {
        $msg = "เพิ่มข้อมูลล้มเหลว" ;
        $mss = "<a href='index.php' class='btn btn-primary'>กลับสู่เมนูหลัก</a>   " ;
    }
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
                
              <a href="index.php" class="logo">
            FOODWEB
                </a>
           
             <span style="float:right;">
             
            </span>
            </div>
            
            
        <br><br><br><br><br><br><br><br><br>
            <span style="text-align:center;font-size:50px;color:black;">
                <div class="container">
     
                    <?php 
         echo $msg ; ?>
         <br>
         <?php echo $mss ;
         ?>
                </div>
            </span>
         
            

          
            
    </body>
    
    
    
</html>
