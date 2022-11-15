<?php
include 'connection.php';
$user_id = $_GET["logid"];

$sql = mysqli_query($conn,"SELECT * FROM userdata r inner join logindata l on  r.log_id = l.log_id where r.log_id = '$user_id'");
// echo $user_id;
$row = mysqli_fetch_assoc($sql);
if (isset($_POST['update'])) {
    echo "hellooii";
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        die('could not connect to database');
    }
    else
    {
        // echo "connection ok";
        $sql1 = mysqli_query($conn,"UPDATE logindata set email = '$email',password='$password' where log_id = '$user_id'");
        $sql2 = mysqli_query($conn,"UPDATE userdata set username ='$name',phonenumber = '$number',log_id = '$user_id' where log_id = '$user_id'");
        if ($sql1 && $sql2) {
            echo "Update successfully";
            echo "<Script>document.location.href='admin.php'</script>";
        }
        else
        {
            echo "updation failed";
            // header('location:register.php');
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
    <title>www.update.in</title>
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
            <h2> Update</h2>
        </div>
       
        <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="User Name" value="<?php echo $row['username']; ?>"><br><br>
        <input type="email" name="email" id="name" placeholder="Email" value="<?php echo $row['email']; ?>"><br><br>
        <input type="text" name="number" id="name" placeholder="Phone Number" value="<?php echo $row['phonenumber']; ?>"><br><br>
        <input type="text" name="password" id="name" placeholder="Password" value="<?php echo $row['password']; ?>"><br><br>
        <input id="btn" name="update" type="submit" value="Upadate">
        </form>
</div>   
</div>
</body>
</html>