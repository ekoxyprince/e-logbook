
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
    if(isset($_POST['submit'])){
        $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
        $number = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
        $company= filter_input(INPUT_POST,'comp',FILTER_SANITIZE_SPECIAL_CHARS);
        $institution = filter_input(INPUT_POST,'inst',FILTER_SANITIZE_SPECIAL_CHARS);
        $study_year = filter_input(INPUT_POST,'year',FILTER_SANITIZE_SPECIAL_CHARS);
        $matno = filter_input(INPUT_POST,'matno',FILTER_SANITIZE_SPECIAL_CHARS);
        $bank = filter_input(INPUT_POST,'bank',FILTER_SANITIZE_SPECIAL_CHARS);
        $bank_no = filter_input(INPUT_POST,'bank_no',FILTER_SANITIZE_SPECIAL_CHARS);
        $stud_no = filter_input(INPUT_POST,'stuid',FILTER_SANITIZE_SPECIAL_CHARS);
        $sup_name = filter_input(INPUT_POST,'sup_name',FILTER_SANITIZE_SPECIAL_CHARS);
        $sql="INSERT INTO itf_table(stud_id,matric_no,name,study_year,institution,bank_name,bank_account,mobile,company_name,super_name) VALUES('$stud_no','$matno','$name','$study_year','$institution','$bank','$bank_no','$number','$company','$sup_name')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location:index.php " );
        }else{
            echo "error in insersion";
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