
<?php
 include 'connection.php';
 $sql = mysqli_query($conn,"SELECT * FROM userdata r inner join logindata l on r.log_id = l.log_id");
 $user_id = $_GET['logid'];
 echo $user_id;
 
  
  $sql1 = mysqli_query($conn,"DELETE FROM logindata where log_id = '$user_id'");
  $sql2 = mysqli_query($conn,"DELETE FROM userdata where log_id = '$user_id'");
  
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>www.admin.php</title>
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
    <div class="table">
        <div class="register">
            <h2> Chaliyo Admin</h2>
        </div>
       
        <table border="1">
          <thead>
        <tr>
          <th>Register id</th>
          <th>Name</th>
          <th>Email</th>
          <th>PhoneNumber</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <?php
            if ($sql->num_rows>0) {
              while ($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                  <td><?php echo $row['log_id']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phonenumber']; ?></td>
                  <td><a href="update.php?logid=<?php echo $row['log_id']; ?>"><input id="edit" type="submit" value="Edit"></a> 
                  <a href="admin.php?logid=<?php echo $row['log_id'] ?>"> <input id="delete" name="delete" type="button" value="Delete"></a></td>
                </tr>
                <?php
              }
            }
          ?>
        </tbody>
        

        </table>
          </div>
          </div>
</body>
</html>