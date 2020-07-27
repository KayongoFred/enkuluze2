
<?php

$site_title = "Enkuluze Search Engine";
include("./include.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enkuluze</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <div class="login-box">
        <div class="row">
            <h1 class="header">WELCOME TO ENKULUZE</h1><br><br>
         

            <!---------------------------------Registration--------------------------------------------->
            
        </div>
      
        </div>

        <div class="login-box">
        <div class="row">
            
             

            <div id="logo">
             <h1></h1>
            </div>
        </div>

        <div id="main" class="shadow-box"><div id="content">
        
        <form action="" method="GET" name="">
         <CENTER>
         <div class="col-md-6 login-left">
            <table>
                <tr>
                    <td><input type="text" name="k" class="form-control" placeholder="search for word" autocomplete="off"></td>
                    <td><input type="submit" class="btn btn-primary" name="" value="Search"></td>
                </tr>
            </table>
            </div>
            </CENTER>

            <?php

                //CHECK TO SEE IF THE KEYWORDS WERE PROVIDED
                if (isset($_GET['k']) && $_GET['k'] != '') {

                    //save the key word from the url(a variable that we can manupulate data for)                    
                    $k = trim($_GET['k']);// The trim() function is used to remove the white spaces and other predefined characters from the left and right sides of a string.

                    // create a base query and words string
                    $query_string = "SELECT * FROM search_engine WHERE ";
                    $display_words = "";

                    //seperate each of the keywords
                    $keywords = explode(' ', $k); //explode() is a built in function in PHP used to split a string in different strings. 
                   foreach ($keywords as $word) {
                       $query_string .=" keywords LIKE '%".$word."%' OR ";
                       $display_words .= $word." ";
                   }
                   $query_string = substr($query_string, 0, strlen($query_string) - 3);

                   // connet to the database
                   $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

                   //PROCES THE QUERY TO SEARCH THE DATABASE
                   $query = mysqli_query($conn, $query_string);

                   // we going to check and see how many results come back to the user
                   $result_count = mysqli_num_rows($query);

                   // check to see if any results were returned
                   if($result_count > 0){ // this means atleat one has been returned, 

                    // display the search result coount to user
                    echo '<div class="right"><font color="red"><b><u>'.$result_count.'</u></b> results found</div>';
                    //display words to the user
                    echo 'Your searching for <i>'.$display_words.'</i><hr/><br/></font>';

                    echo '<div class="col-md-6 login-left"> <table class="search ">';

                    //displying all the search results back to the user
                    while ($row = mysqli_fetch_assoc($query)){
                        echo ' <tr>
                                <td><b><h3><a href="'.$row['url'].'">'.$row['title'].'</a></h3></td>
                                </tr>
                                <tr>
                                <td>'.$row['blurb'].'</td>
                                </tr>
                                <tr>
                                <td>'.$row['url'].'</td>
                                
                               
                            </tr>';
                    }

                    echo '</table></div>';

                   }
                   else
                   echo 'No results found. Please search something else.';
                }
                else
                    echo '';
            ?>
            </div>

        </form>
                
        </div></div>

        <div id="footer"></div>
    </div>

        <!------------------------------------------------------------>

    </div>












<!------------registration and login by KayongoFred  RegNo=> 2017-B072-20006------------->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by KayongoFred  RegNo=> 2017-B072-20006 <a href="admin/index.php">Admin</a>
</body>
</html>