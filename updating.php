<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enkuluze</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
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
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    //pre_r($result);
    // am going to use method fetch_assoc to fetch the records from table
   // pre_r($result->fetch_assoc());
    
    // am going to make use of while roop that will keep on fetching whatever record that is being added to the table
?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
    <?php
    // we are looping through the result fetch assoc to access pulling the recods from the database and stored inside the variable $row
        while ($row = $result->fetch_assoc()):    ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
                <a href="updating.php?edit=<?php echo $row['id']; ?>"
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
    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
     <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
        </div>
        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your name">
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
    
</body>
</html>