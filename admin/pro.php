<?php

//imcoparation of sessions
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'enkuluze') or die(mysqli_error($mysqli));


//---------------reg-------------------------------------------

if (isset($_POST['reg'])){
    $title = $_POST['user'];
    $url = $_POST['password'];
    $blurb = $_POST['gender'];
    
   
    $s = "select * from usertable where name = '$title'";
    $result = mysqli_query($mysqli, $s);
    $num = mysqli_num_rows($result);

    if (count($result)==1){
       
        
    $_SESSION['message'] = "Record already Exist!";
    $_SESSION['msg_type'] = "danger";

    header("location: reg.php");

    }else{
       
        $mysqli->query("INSERT INTO ussertable (name, password, gender) VALUES ('$title', '$url', '$blurb')") or die($mysqli->error);
    
        $_SESSION['message'] = "Registration has been saved!";
        $_SESSION['msg_type'] = "success";
    
        header("location: index.php");
    
    }


}
?>