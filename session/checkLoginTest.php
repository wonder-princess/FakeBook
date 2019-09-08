<?php

session_start();
$userdata = $_SESSION['userdata'];

/*
if(true){
    header("Location:mypageTest.php") ; 
    } else {header("Location:loginTest.html") ; }
*/

if(!empty($_SESSION['userdata'])){
    header("Location:mypageTest.php") ; 
    } else {header("Location:loginTest.html") ; }

?>