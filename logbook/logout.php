<?php
session_start();
if(isset($_SESSION['userid'])){
session_destroy();
header("Location:/logbook/" );
}
else{
    header("Location:/logbook/ " );
}
?>