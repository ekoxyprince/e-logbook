
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
    $user_email = $user_details['email'];
    $user_phone = $user_details['phone'];
    $user_address = $user_details['adress'];
    $user_state = $user_details['state'];
    $user_userindustry = $user_details['industry'];
    $user_stuid = $user_details['studentid'];
    $user_imgsrc = $user_details['imgsrc'];
    $user_year = $user_details['gradyear'];
  }else{
    header("Location:/logbook/userlogin.php " );
  }
}
else{
    header("Location:/logbook/userlogin.php" );
};
?>
<?php 
$message = "";
if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $number = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_SPECIAL_CHARS);
    $state = filter_input(INPUT_POST,'state',FILTER_SANITIZE_SPECIAL_CHARS);
    $studid = filter_input(INPUT_POST,'studid',FILTER_SANITIZE_SPECIAL_CHARS);
    $year = filter_input(INPUT_POST,'year',FILTER_SANITIZE_SPECIAL_CHARS);
    $industry = filter_input(INPUT_POST,'industry',FILTER_SANITIZE_SPECIAL_CHARS);
    $allowed_ext = array('jpg','jpeg','png','gif');
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_temp = $_FILES['upload']['tmp_name'];
    $file_type = $_FILES['upload']['type'];
    $file_ext = explode(".",$file_name);
    $file_ext = strtolower(end($file_ext));
    $target_dir= "uploads/${file_name}";
    if(in_array($file_ext,$allowed_ext)){
     if($file_size<=1000000){
        move_uploaded_file($file_temp,$target_dir);
        $sql = "UPDATE students SET email = '$email',phone ='$number',adress='$address',state='$state',imgsrc='$target_dir',studentid = '$studid',gradyear='$year',industry ='$industry'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location:profile.php" );
        }
       }
     else{
       $message = '<p style="color:red;">file size is too large</P';
     }
    }else{
       $message = '<p style="color:red;">invalid file format</P';
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
<section class="mb-3">
<div class="container rounded bg-white ">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo$user_imgsrc?>"><span class="font-weight-bold"><?php echo $user_name ?></span><span class="text-black-50"><?php echo $user_email ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Student Information</h4>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" class="mb-3">
                <h1><?php echo $message ?></h1>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" value="<?php echo $user_name?>" readonly></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value="<?php echo $user_phone?>"required></div>
                    <div class="col-md-12"><label class="labels">Email Adress</label><input type="email" name="email" class="form-control" placeholder="enter email address" value="<?php echo $user_email?>"required></div>
                    <div class="col-md-12"><label class="labels">Name of industry</label><input type="text" name="industry" class="form-control" placeholder="enter email address" value="<?php echo $user_userindustry?>"required></div>
                  
                </div>
                <div class="row mt-1">
                <div class="col-md-4"><label class="labels">Course</label><input type="text" class="form-control" name="address" placeholder="enter Course " value="<?php echo $user_address?>"required></div>
                    <div class="col-md-4"><label class="labels">Level</label><input type="text" class="form-control" name="state" value="<?php echo $user_state?>" placeholder="enter level"required></div>
                    <div class="col-md-4"><label class="labels">Year of graduation</label><input type="text" class="form-control" name="year" placeholder="year of graduation" value="<?php echo $user_year?>"required></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6"><label class="labels">Upload Image</label><input type="file" name="upload" class="form-control" required></div>
                    <div class="col-md-6"><label class="labels">Matriculation no</label><input type="text" name="studid" class="form-control" value="<?php echo $user_stuid?>" placeholder="matric number"required ></div>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" name="submit" value="Save Profile"></div>
                </form>
            </div>
        </div>
      
    </div>
</div>
</div>
</div>
</section >
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