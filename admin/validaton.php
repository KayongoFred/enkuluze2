<?php

///here i will start the session

session_start();


// Creating a connection to the sever!
$con = mysqli_connect('localhost', 'root', '');

//selecting the database to use
mysqli_select_db($con, 'enkuluze');

//creating the variables that will store the names of the inputs 
$name = $_POST['user'];
$pass = $_POST['password'];

//
$s = "select * from usertable where name = '$name' && password = '$pass'";

// creating a result variable that will store this query
$result = mysqli_query($con, $s);

// creat a num variable that will count the number of rows how many time the name apeared in the table
$num = mysqli_num_rows($result);

//creating a conditioning statement to check if the username is taken
if($num == 1){
    $_SESSION['username'] = $name;
    header ('location:newEnty.php');
}else{
    header ('location:login.php');
}

//<!------------registration and login by KayongoFred  RegNo=> 2017-B072-20006------------->
?>