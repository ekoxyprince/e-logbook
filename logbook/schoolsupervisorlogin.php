<?php include "inc/loginheader.php" ?>
<?php 
session_start();
$err = "";
if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
    $sql ="SELECT * FROM supervisor WHERE username = '$name'";
    $result =mysqli_query($conn,$sql);
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if($output){
        $user_details = $output[0];
       $user_id = $user_details['id'];
       $user_name = $user_details['username'];
       $user_pass = $user_details['password'];
       $user_access = password_verify($password,$user_pass);
       if($user_access == true){
        $_SESSION['userid'] = $user_name;
        header('location:/logbook/supervisor/index.php');
       }else{
       $err = "incorrect username or password";
        }
       
    }else{
        $err = "incorrect username or password";
    } 
}
?>
<section>
<div class="container">
    <div class="form m-auto">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div>
        <h1>SCHOOL SUPERVISOR LOGIN</h1>
    </div>
    <?php echo "<p style ='color:red;'> $err</P>" ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</section>
<?php include "inc/footer.php" ?>