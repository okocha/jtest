<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin</title>

    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>
<body>



<form class="form-signin text-center" action="check-login.php" method="post">
    

    <h1 class="h3 mb-3 font-weight-normal ">Admin Login</h1>
    
    <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
    <input type="password" name="pass" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>




</body>
</html>

