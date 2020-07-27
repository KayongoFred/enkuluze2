<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Enkuruze</title>
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
				<li><a href="newEnty.php">New Entry</a></li>
				<li><a href="#">Add, Edit and View</a></li>
				
				<li><a href="users.php">View Users</a></li>
			</ul><!-- main-menu -->
			
		</div><!-- container -->
	</header>

	
	
	
	<div class="social-section" id="social-section">
		<div class="container">
			
			<ul>
				<li>Follow us on social media</li>
				<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
				<li><a href="#"><i class="ion-social-facebook"></i></a></li>
				<li><a href="#"><i class="ion-social-twitter"></i></a></li>
				<li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
			</ul>
			
		</div><!-- container-->
	</div><!-- social-section -->
	
	
	<!----------------------Start of view point------------------------->


	<?php require_once 'process.php';?>

<?php

    //checking to see if the session massege has been set
    if(isset($_SESSION['message'])):    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif?>


<div class="container">

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'enkuluze') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM search_engine") or die($mysqli->error);
    //pre_r($result);
    // am going to use method fetch_assoc to fetch the records from table
   // pre_r($result->fetch_assoc());
    
    // am going to make use of while roop that will keep on fetching whatever record that is being added to the table
?>
    <div class="row justify-content-center">
        <table class="table" >
            <thead>
            <tr>
                <th>Title</th>
				<th>url</th>
				<th>Blurb/Meaning</th>
                <th>KeyWords</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
    <?php
    // we are looping through the result fetch assoc to access pulling the recods from the database and stored inside the variable $row
        while ($row = $result->fetch_assoc()):    ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
			<td><?php echo $row['url']; ?></td>
			<td><?php echo $row['blurb']; ?></td>
            <td><?php echo $row['keywords']; ?></td>
            <td>
                <a href="vitem.php?edit=<?php echo $row['id']; ?>"
                class="btn btn-info">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']?>"
                class="btn btn-danger">Delete</a>

            </td>
        </tr>
        <?php endwhile; ?>
        </table>
    </div>

   <?php    
    // the pre_r function 
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
?>
	<center><h3><font color="aqua">Edit/Add</font></h3></center>
    <div class="row justify-content-center">
		

    <form action="process.php" method="POST">

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
        <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $name; ?>" placeholder="Enter the title">
		</div>
		
        <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" class="form-control" value="<?php echo $location; ?>" placeholder="Enter URL">
		</div>
		
        <div class="form-group">
        <label>Blurb/Meaning</label>
        <textarea name="blurb" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Meaning"></textarea>
		</div>
		
        <div class="form-group">
        <label>KeyWords</label>
        <textarea name="keywords" class="form-control" value="<?php echo $location; ?>" placeholder="Enter keywords"></textarea>
		</div>
		
        <div class="form-group">

        <?php
        if ($update == true):
        ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <?php endif; ?>
     <div>
    </form>
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