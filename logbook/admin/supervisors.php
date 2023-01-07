<?php 
include "../config/database.php" ;
session_start();
if(isset($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
  $sql = "SELECT * FROM admin WHERE username = '$user_id'";
  $result = mysqli_query($conn,$sql);
  $output = mysqli_fetch_all($result,MYSQLI_ASSOC); 
  if($output){
    $user_details = $output[0];
    $user_id = $user_details['id'];
    $user_name = $user_details['username'];
  }else{
    header("Location:/logbook/" );
  }
 
}
else{
    header("Location:/logbook/" );
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>E-logbook</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Electronic-Logbook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="./">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supervisors.php">supervisor</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="progress.php">progress chart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">logout</a>
                    </li>
            </li>
        </ul>
      </div>
  </div>
</nav>
<section>
<div class="container">
<?php
$sql = "SELECT * FROM supervisor";
$result = mysqli_query($conn,$sql);
$output = mysqli_fetch_all($result,MYSQLI_ASSOC); 
 $sum = 0;

?>
<?php 
$message = "";
if(isset($_POST['submit'])){

    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
    $hashed_password = password_hash($password,PASSWORD_BCRYPT);
    $default = " ";
    $sql="INSERT INTO supervisor(username,password) VALUES('$name','$hashed_password')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location:supervisors.php " );
    }else{
        echo "error in insersion";
    }
    echo $name.$hashed_password ;
 
}
?>
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Assign Admin</button> 
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($output as $data): ?>
    <tr>
        <?php $sum++ ?>
      <th scope="row"><?php echo $sum ?></th>
      <td> <?php echo $data['username']?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</section>


<footer class="text-center mt-5">
  Copyright &copy; 2022
</footer>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="text" name="password" class="form-control" name password id="recipient-name">
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="assign">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script>
    var navBtn = document.getElementById("navBtn")
    var dropdownToggle = document.getElementById("dropdown")
    navBtn.onclick = ()=>{
        dropdownToggle.classList.toggle("show")
    }
    
</script>
</body>
</html>