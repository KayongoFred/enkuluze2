
<?php

$site_title = "Enkuluze Search Engine";
include("./include.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>

    <link rel="stylesheet" type="text/css" href="main.css"></link>
</head>
<body>
    
    <div id="wrapper">
        <div id="top_header">
            <div id="nav">
                <a href="<?php echo SIT_ADDR;?>/new_entry.php">New Entry</a>
            </div> 

            <div id="logo">
             <h1></h1>
            </div>
        </div>

        <div id="main" class="shadow-box"><div id="content">
        
        <form action="" method="GET" name="">
         <CENTER>
            <table>
                <tr>
                    <td><input type="text" name="k" placeholder="search for word" autocomplete="off"></td>
                    <td><input type="submit" name="" value="Search"></td>
                </tr>
            </table>
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
                    echo '<div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
                    //display words to the user
                    echo 'Your search for <i>'.$display_words.'</i><hr/><br/>';

                    echo '<table class="search">';

                    //displying all the search results back to the user
                    while ($row = mysqli_fetch_assoc($query)){
                        echo '<tr>
                                <td><b><h3><a href="'.$row['url'].'">'.$row['title'].'</a></h3></td>
                                </tr>
                                <tr>
                                <td>'.$row['blurb'].'</td>
                                </tr>
                                <tr>
                                <td>'.$row['url'].'</td>
                                
                               
                            </tr>';
                    }

                    echo '</table>';

                   }
                   else
                   echo 'No results found. Please search something else.';
                }
                else
                    echo '';
            ?>

        </form>
                
        </div></div>

        <div id="footer"></div>
    </div>
</body>
</html>