<?php

//imcoparation of sessions
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'enkuluze') or die(mysqli_error($mysqli));

$id = 0;
$update=false;
$name='';
$location='';

if (isset($_POST['save'])){
    $title = $_POST['title'];
    $url = $_POST['url'];
    $blurb = $_POST['blurb'];
    $keywords = $_POST['keywords'];

   
    $s = "select * from search_engine where title = '$title'";
    $result = mysqli_query($mysqli, $s);
    $num = mysqli_num_rows($result);

    if (count($result)==1){
       
        
    $_SESSION['message'] = "Record already Exist!";
    $_SESSION['msg_type'] = "danger";

    header("location: vitem.php");

    }else{
       
        $mysqli->query("INSERT INTO search_engine (title, url, blurb, keywords) VALUES ('$title', '$url', '$blurb', '$keywords')") or die($mysqli->error);
    
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    
        header("location: vitem.php");
    
    }


}


if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM search_engine WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: vitem.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM search_engine WHERE id=$id") or die($mysqli->error());

    //check if the result has been found in the database
    if (count($result)==1){
        $row = $result->fetch_array();
        $title = $row['title'];
        $url = $row['url'];
        $blurb = $row['blurb'];
        $keywords = $row['keywords'];

    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $blurb = $_POST['blurb'];
    $keywords = $_POST['keywords'];


    $mysqli->query("UPDATE search_engine SET title='$title', url='$url' blurb='$blurb', keywords='$keywords' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";

    header('location:vitem.php');
}
?>