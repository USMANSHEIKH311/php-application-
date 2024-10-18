<?php 

include("config/database.php");

if(isset($_POST['submit'])){
    extract($_POST);
    $pass = md5($password);
    $sql="SELECT * FROM users WHERE username = '$username' AND password = '$pass'";
    $result = $conn->query($sql);
    if($result->num_rows){
         $_SESSION['is_user_loggedin'] = true;
         $_SESSION['user_data'] = mysqli_fetch_assoc(($result));
         $_SESSION['success'] = "login successful";
         header("location:users.php");
    } else {
        $_SESSION['error'] = "invaild info ";
       
    }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>login form</title>
</head>
<body>
    <section>
<?php  include("include/alert.php");?>
        <h2>login form</h2>
        <form action="login.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit" name="submit">login</button>
            </div>
        </form>
    </section>
</body>
</html>