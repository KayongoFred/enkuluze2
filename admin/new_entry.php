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
    
    <div id="wrapper">

        <div id="top_header">
            <div id="nav">
                <a href="">New Entry</a>
            </div>

            <div id="logo">

            </div>
        </div>

        <div id="main"><div id="content">

            <?php

                // check to see if the form was submitted
                if (isset($_POST['addbtn'])){
                    // get all the form data
                    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : "";
                    $blurb = isset($_POST['blurb']) ? htmlspecialchars($_POST['blurb']) : "";
                    $url = isset($_POST['url']) ? htmlspecialchars($_POST['url']) : "";
                    $keywords = isset($_POST['keywords']) ? htmlspecialchars($_POST['keywords']) : "";

                    // CONNECT TO THE DB
                    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                        
                    $s = "select * from search_engine where title = '$title'";

                    // creating a result variable that will store this query
                    $result = mysqli_query($conn, $s);

                    // creat a num variable that will count the number of rows how many time the name apeared in the table
                    $num = mysqli_num_rows($result);
                      //creating a conditioning statement to check if the username is taken
                      if($num == 1){
                        echo "Title already exist!";

                        

                    // make sure all the form data was submitted
                    if ($title && $blurb && $url && $keywords){
                        // setup some vars
                        $id = '';

                        
                      

                        mysqli_query($conn, "INSERT INTO search_engine VALUES ('$id', '$title', '$blurb', '$url', '$keywords')");

                        // MAKE SURE ENTRY WAS CREATED
                        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM  search_engine WHERE title='{$title}' AND url='{$url}'"))){

                            echo 'New entry was added';

                            $title = '';
                            $url = '';
                            $keywords = '';
                            $blurb = '';
                        }
                        else{
                            echo 'An error occured. No new entry was added';
                    }
                }
                    else{
                        echo 'Please provide all data. the entire form is reqired.';
                
                }
                    }else{
                    echo '<font color="red">Entry already exist!</font>';}
            }
                
            ?>

            <form action="" method="POST" name="">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" value="<?php echo isset($title) ? $title : ""; ?>" /></td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td><input type="text" name="url" value="<?php echo isset($url) ? $url : ""; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Blurb</td>
                        <td><textarea name="blurb" value="<?php echo isset($blurb) ? $blurb : ""; ?>"></textarea></td>
                    </tr>
                    <tr>
                        <td>Keywords</td>
                        <td><textarea name="keywords" value="<?php echo isset($keywords) ? $keywords : ""; ?>"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="addbtn" value="Add Entry" /></td>
                    </tr>
                </table>
            </form>


        </div></div>

        <div id="footer">
        </div>
    </div>
</body>
</html>