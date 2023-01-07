<?php
include "../config/database.php" ;
$id = $_GET['id'];
echo $id;
$sql = "UPDATE progress SET status ='declined' WHERE stud_id ='$id'";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: progress.php" );
}else{
    die(mysqli_error($conn));
}
?>