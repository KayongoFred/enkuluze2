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
            <div class="col-md-6 login-left">
            <h2> Login Here </h2>
            <form action="pro.php" method="post">
             <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control" required>
             </div>
             <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
             </div>
             <div class="form-group">
                <label>Gender</label><br>
                <center><label>Male</label></center>
                <input type="radio" name="gender" value="Male" class="form-control" required>
                <center><label>Female</label></center>
                <input type="radio" name="gender" value="Female" class="form-control" required>
             </div>
             
             <button type="submit" class="btn btn-primary" name="reg"> Register </button> 
            </form>
            </div>

            <!---------------------------------Registration--------------------------------------------->
            
        </div>
      
        </div>

    </div>
<!------------registration and login by KayongoFred  RegNo=> 2017-B072-20006------------->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by KayongoFred  RegNo=> 2017-B072-20006 <a href="index.php">Login</a>
</body>
</html>