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
<?php 
$message = "";
if(isset($_POST['submit'])){

    $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date('l jS \of F Y h:i:s A');
    $sql="INSERT INTO board(title,message,time) VALUES('$title','$message','$date')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location:index.php " );
    }else{
        echo "error in insersion";
    }
 
}
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
  <p class="lead">Welcome <?php echo $user_name ?> to your Adminitrative page <br>You can now view and access Members and assign supervisors.</p>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Send Notice and Announcements</button>
   
  </p>
</div>
</div>
</section>


<footer class="text-center mt-5">
  Copyright &copy; 2022
</footer>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SEND NOTICES/ANNOUNCEMENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea name="message" class="form-control" id="message-text"></textarea>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="SEND">
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