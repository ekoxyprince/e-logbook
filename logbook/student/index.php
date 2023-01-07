<?php 
include "../config/database.php" ;
session_start();
if(isset($_SESSION['username'])){
    $user_id = $_SESSION['username'];
  $sql = "SELECT * FROM students WHERE username = '$user_id'";
  $result = mysqli_query($conn,$sql);
  $output = mysqli_fetch_all($result,MYSQLI_ASSOC); 
  if($output){
    $user_details = $output[0];
    $user_id = $user_details['uid'];
    $user_name = $user_details['username'];
    $sql1 = "SELECT * FROM itf_table WHERE stud_id ='$user_id'";
    $result1 = mysqli_query($conn,$sql1);
    $output1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
  }else{
    header("Location:/logbook/userlogin.php " );
  }
 
}
else{
    header("Location:/logbook/userlogin.php " );
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
                        <a class="nav-link" href="profile.php">profile</a>
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
  <p class="lead">Welcome <?php echo $user_name ?> to your page make sure submit all required forms <br>and also fill your progress chart.</p>
  <?php if(empty($output1)): ?>
       <h2 style="color: red;">PLease Fill in Your ITF Form </h2>
        <?php endif;?>
  <p class="lead">
  <?php if(empty($output1)): ?>
        <a class="btn btn-primary btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#" role="button">ITF Form</a>
        <?php endif;?>
    <a class="btn btn-primary btn-lg" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"  role="button">Progress Chart</a>
  </p>
</div>
</div>
</section>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Please Provide All Informations Correctly</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="itf.php" method="post" >
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Fullname</label><input type="text" name="name" class="form-control" placeholder="enter fullname" value="" required></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value=""required></div>
                    <div class="col-md-12"><label class="labels">Company Name</label><input type="text" name="comp" class="form-control" placeholder="enter company name" value=""required></div>
                  
                </div>
                <div class="row mt-1">
                <div class="col-md-8"><label class="labels">Institution</label><input type="text" class="form-control" name="inst" placeholder="enter institution " value=""required></div>
                    <div class="col-md-4"><label class="labels">Year of study</label><input type="text" class="form-control" name="year" placeholder="year of study" value=""required></div>
                </div>
                <div class="row mt-1">
                <div class="col-md-6"><label class="labels">Bank Name</label><input type="text" class="form-control" name="bank" placeholder="enter bank name " value=""required></div>
                    <div class="col-md-6"><label class="labels">Bank Account no</label><input type="text" class="form-control" name="bank_no" placeholder="enter bank account no" value=""required></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6"><label class="labels">Matriculation no</label><input type="text" name="matno" class="form-control" value="" placeholder="enter matric number"required ></div>
                    <div class="col-md-6"><label class="labels">Supervisor's name</label><input type="text" name="sup_name" class="form-control" value="" placeholder="Supervisor's name"required ></div>
                    <div class="col-md-8"><input type="text" name="stuid" class="form-control" value="<?php echo $user_id?>" placeholder="enter matric number"required hidden></div>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" name="submit" value="Submit Form"></div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<!--Modal2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Enter Your Weekly Progress Charts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="postprogress.php" method="post" enctype="multipart/form-data" >
                <div class="row mt-1 d-flex justify-content-end">
                    <div class="col-md-6 "><label class="labels">Week</label><input type="text" name="week" class="form-control" placeholder="week" value="" required></div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-6"><label class="labels">Week ending</label><input type="text" name="week_end" class="form-control" placeholder="week ending" value="" required></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Monday</label><input type="text" name="mon" class="form-control" placeholder="Monday Activity" value=""required></div>
                    <div class="col-md-12"><label class="labels">Tuesday</label><input type="text" name="tue" class="form-control" placeholder="Tuesday Activity" value=""required></div>
                <div class="col-md-12"><label class="labels">Wednesday</label><input type="text" class="form-control" name="wed" placeholder="Wednessday Activity" value=""required></div>
                    <div class="col-md-12"><label class="labels">Thursday</label><input type="text" class="form-control" name="thur" placeholder="Thursday Activity" value=""required></div>
                    <div class="col-md-12"><label class="labels">Friday</label><input type="text" class="form-control" name="fri" placeholder="Friday Activity " value=""required></div>
                    <div class="col-md-12"><label class="labels">Saturday</label><input type="text" class="form-control" name="sat" placeholder="Saturday Activity" value=""required></div>
                </div>
                
                <div class="row mt-1">
                    <div class="col-md-6"><label class="labels">Attachment</label><input type="file" name="upload" class="form-control" required ></div>
                    <div class="col-md-8"><input type="text" name="stuid" class="form-control" value="<?php echo $user_id?>" placeholder="enter matric number"required hidden></div>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" name="submit" value="Submit Form"></div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
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