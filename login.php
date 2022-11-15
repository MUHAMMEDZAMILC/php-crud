<?php
    include 'connection.php';
    if(isset($_POST['login']))
    {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = mysqli_query($conn,"SELECT * FROM logindata where email = '$email' && password = '$password'");
        if (mysqli_num_rows($sql)>0) {
            echo 'login successfully';
           
            echo "<Script>document.location.href='admin.php'</script>";
        }
        else {
            echo "failed";
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
    <title>www.login.in</title>
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
            <h2> Login</h2>
        </div>
        <form action="" method="post">
            <input type="email" name="email" id="name" placeholder="emial id"><br><br>
            <input type="password" name="password" id="name" placeholder="password"><br><br>
            <div class="buttons">
            <a href="index.php"><input id="btn" type="button" value=" goto register"></a> <input id="btn" name="login" type="submit" value="Login">
            </div>
            
        </form>
</div>
</div>
</body>
</html>