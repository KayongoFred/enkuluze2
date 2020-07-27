<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Taxx</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="common-css/bootstrap.css" rel="stylesheet">
	
	<link href="common-css/ionicons.css" rel="stylesheet">
	
	<link href="common-css/swiper.css" rel="stylesheet">
	
	<link href="01-homepage/css/styles.css" rel="stylesheet">
	
	<link href="01-homepage/css/responsive.css" rel="stylesheet">
	
</head>
<body>
	
		
 	<header>
		
		<div class="container">
		
			<a class="logo" href="#"><img src="" alt="Logo"></a>
			
			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
			
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="#">New Entry</a></li>
				<li><a href="vitem.php">Add, Edit and View Entry</a></li>
				<li><a href="index.php">Log Out</a></li>
				
				<li><a href="06-contact.html">View Users</a></li>
			</ul><!-- main-menu -->
			
		</div><!-- container -->
	</header>

	
	
	
	<div class="social-section" id="social-section">
		<div class="container">
			
			<ul>
				<li>social media</li>
				<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
				<li><a href="#"><i class="ion-social-facebook"></i></a></li>
				<li><a href="#"><i class="ion-social-twitter"></i></a></li>
				<li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
			</ul>
			
		</div><!-- container-->
	</div><!-- social-section -->
	
	
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

				

			}else{
		   // echo '<font color="red">Entry already exist!</font>';
			
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
				 //   echo 'An error occured. No new entry was added';
			}
		}
			else{
				echo 'Please provide all data. the entire form is reqired.';
		
		}
		}
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
	
	
	
	
	
	
	


	
	<!-- SCIPTS -->
	
	<script src="common-js/jquery-3.1.1.min.js"></script>
	
	<script src="common-js/tether.min.js"></script>
	
	<script src="common-js/bootstrap.js"></script>
	
	<script src="common-js/swiper.js"></script>
	
	<script src="common-js/scripts.js"></script>
	
</body>
</html>