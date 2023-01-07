<?php 
include "../config/database.php" ;
session_start();
if(isset($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
  $sql = "SELECT * FROM supervisor WHERE username = '$user_id'";
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
<div class="jumbotron bg-info">

  <h1 class="display-4">Good Day!</h1>
  <p class="lead">Welcome <?php echo $user_name ?> to your Supervising page <br>You can now view and access student's progress chart.</p>
 
   
  </p>
</div>
</div>
</section>


<footer class="text-center mt-5">
  Copyright &copy; 2022
</footer>
 
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