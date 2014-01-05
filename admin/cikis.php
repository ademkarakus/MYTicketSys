<?php
if($_GET['cikis']==1){ //get ile gelen url true ise
    session_destroy();	// oturumu sonlandır 
    header("Location: login/index.php");
    exit();
}