<?php 

include("config/database.php");
include("middleware.php");

#delete
if(isset($_GET['id'])){
$sql = "DELETE FROM users WHERE id = ".$_GET['id'];
$delete = $conn->query($sql);
if ($delete) {
    echo  "user has been deleted ";
} else {
    echo "something went wrong ";
}
}

#update
$sql = "select * from users";
$result = $conn->query($sql);

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
    <section>
        <?php  include("include/alert.php");  ?>
        <h2>All Users</h2>
        <table id="users">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php     
                if($result->num_rows>0){  
                 while ($row = mysqli_fetch_assoc($result)) {                    
                ?>
                    <tr>
                       <td>
                     <?php echo $row['username'] ?> </td>
                       <td>  <?php echo date("d-m-Y H:i:s A",strtotime($row['created_at'])) ?> </td>
                       <td>
                                <a href="edit-user.php?id=<?php echo $row ['id'] ?>" class="button edit">Edit</a>
                                <a href="users.php?id=<?php echo $row['id'] ?>" class="button delete">Delete</a>
                            </td>
                        </tr>                      
                 <?php    
                   } }else {
                    echo "<tr><td colspan='3'> NO RECORD FOUNDED!</tr></td>";
                 }  
                 ?>                
            </tbody>
        </table>
            <div class="container" style="background-color:#f1f1f1">
               <a href="add-user.php" class="footerbtn">Add User</a>
               <a href="logout.php" class="footerbtn">logout</a>
    </div>
    </section>
</body>
</html>