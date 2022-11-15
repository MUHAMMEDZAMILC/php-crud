<?php
   include 'connection.php';
   if (isset($_POST['register'])) {
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['password'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phonenumber = $_POST['number'];
        $password = $_POST['password'];
        
        if ($conn -> connect_error) {
         die ('could not connect to the database');
        }
        else
        {
        
         $sql1 = mysqli_query($conn,"INSERT INTO logindata(email,password) values ('$email','$password')");
         $logid=mysqli_insert_id($conn);
         $sql2=mysqli_query($conn, "INSERT INTO userdata(username,phonenumber,log_id) values('$name','$phonenumber','$logid')");
         if($sql1 && $sql2){
            echo "<Script>document.location.href='login.php'</script>";
         }else{
             echo"Registration Failead";
         }
        }
        }
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>www.register.in</title>
</head>
<body>
    <div class="navbar">
        <div class="navhead">
            <h2>Chaliyo</h2>
        </div>
        
        <div class="search">
        <span class="material-symbols-outlined">search</span>
        </div>
    </div>
    <div class="content">
    <div class="form">
        <div class="register">
            <h2> Register</h2>
        </div>
    <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Username"><br><br>
            <input type="email" name="email" id="name" placeholder="emial id"><br><br>
            <input type="text" name="number" id="name" placeholder="phonenumber"><br><br>
            <input type="password" name="password" id="name" placeholder="password"><br><br>
            <div class="buttons">
            <a href="login.php"><input type="button" name="login" id="btn" value="goto login"></a>  <input id="btn" name="register" type="submit" value="Register">
            </div>
            
        </form>
    </div>
    
    </div>
        
    
</body>
</html>