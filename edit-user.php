<?php 
include("config/database.php");
include("middleware.php");


#update
#step = 1
if(isset($_GET['id'])){
    $sql = "select * from users where id = ".$_GET['id'];
      $result = $conn->query($sql);
      $user = mysqli_fetch_assoc($result);
}else {
        echo "invalid request";
    }

#step=2 
 if(isset($_POST['submit'])){
     extract ($_POST);
    //   $sql = "UPDATE users SET username = '$username', password = '$password' where id=".$_GET['id'];
    $sql = "UPDATE users SET username = '$username' where id=".$_GET['id'];

      $result = $conn->query($sql); 
      if ($result) {
         $_SESSION['success'] = "user has been updated ";
    } else {
         $_SESSION['error'] = "something went wrong ";
    }
    header("location:users.php");    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>PHP CRUD Application</title>
</head>
<body>
    
    <h2>Edit Form</h2>
        <form action="edit-user.php?id=<?php echo  $user ['id'] ?>" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required value="<?php echo $user ['username'] ?>">

              <?Php  /*<label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required  value="<?php echo $user ['password'] ?>" >*/ ?>

                <button type="submit" name="submit">update</button>
            </div>
        </form>
        <div class="container" style="background-color:#f1f1f1">
               <a href="users.php" class="footerbtn">All User</a>
               <a href="logout.php" class="footerbtn">logout</a>
    </div>
</body>
</html>

