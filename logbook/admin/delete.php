<?php
include "../config/database.php" ;
$id = $_GET['id'];
echo $id;
$sql = "DELETE FROM students WHERE uid ='$id'";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: user.php" );
}else{
    die(mysqli_error($conn));
}
?>