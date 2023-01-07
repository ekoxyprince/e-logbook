
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
    $user_name = $user_details['uid'];
    if(isset($_POST['submit'])){
        $week = filter_input(INPUT_POST,'week',FILTER_SANITIZE_SPECIAL_CHARS);
        $week_end = filter_input(INPUT_POST,'week_end',FILTER_SANITIZE_SPECIAL_CHARS);
        $mon= filter_input(INPUT_POST,'mon',FILTER_SANITIZE_SPECIAL_CHARS);
        $tue = filter_input(INPUT_POST,'tue',FILTER_SANITIZE_SPECIAL_CHARS);
        $wed = filter_input(INPUT_POST,'wed',FILTER_SANITIZE_SPECIAL_CHARS);
        $thur = filter_input(INPUT_POST,'thur',FILTER_SANITIZE_SPECIAL_CHARS);
        $fri = filter_input(INPUT_POST,'fri',FILTER_SANITIZE_SPECIAL_CHARS);
        $sat = filter_input(INPUT_POST,'sat',FILTER_SANITIZE_SPECIAL_CHARS);
        $stud_no = filter_input(INPUT_POST,'stuid',FILTER_SANITIZE_SPECIAL_CHARS);
        $status = "pending";
        $allowed_ext = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_temp = $_FILES['upload']['tmp_name'];
        $file_type = $_FILES['upload']['type'];
        $file_ext = explode(".",$file_name);
        $file_ext = strtolower(end($file_ext));
        $target_dir= "uploads/${file_name}";
      echo $week.$week_end.$mon.$tue.$wed.$thur.$fri.$sat.$stud_no.$status.$target_dir;
      if(in_array($file_ext,$allowed_ext)){
        if($file_size<=1000000){
           move_uploaded_file($file_temp,$target_dir);
           $sql = "INSERT INTO progress(stud_id,week,week_end,mon,tue,wed,thur,fri,sat,attachment,status) VALUES('$stud_no','$week','$week_end','$mon','$tue','$wed','$thur','$fri','$sat','$target_dir','$status')";
           $result = mysqli_query($conn,$sql);
           if($result){
               header("Location:index.php" );
           }
          }
        else{
          $message = '<p style="color:red;">file size is too large</P';
        }
       }else{
          $message = '<p style="color:red;">invalid file format</P';
       }
    }
  }else{
    header("Location:/logbook/userlogin.php " );
  }
 
}
else{
    header("Location:/logbook/userlogin.php " );
};

?>