<?php

$site_title = "Enkuluze Search Engine";
include("./include.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <center>
<form action="" method="POST" name="">

<input type="text" name="id" value="" placeholder="Enter the id" /><br>

<input type="text" name="title" value="" placeholder="Enter the title" /><br>



<textarea name="blurb" value="" placeholder="Enter meaning"></textarea><br>

<textarea name="keywords" value="" placeholder="Enter keywords"></textarea><br>

<input type="submit" name="update" value="UPDATE DATA" />
               
            </form>
            </center>

</body>
</html>

<?php
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$db = mysqli_select_db($conn, DB_NAME);

  if (isset($_POST['update']))  
  {
    $id = $_POST['id'];

    $query = "UPDATE 'search_engine' SET title='$_POST[title]',blurb='$_POST[blurb]',keywords='$_POST[keywords]' where id='$_POST[id]' ";
    $query_run = mysqli_query($conn,$query);

    if ($query_run)
    {
        echo '<script type="text/javascript"> alert("Data Updated")</script>';
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
    }
  }                    

  ?>