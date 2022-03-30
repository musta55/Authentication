<?php
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';
ob_start();
?>

<?php

// if($_SERVER["REQUEST_METHOD"]=="POST"){
if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    //Check whether this user exists
   $existSql ="SELECT * FROM `usernew` WHERE username='$username'";
   $result = mysqli_query($conn, $existSql);
   $numExistRows= mysqli_num_rows($result);
   if($numExistRows>0){
       $exists =true;
   }
   else {
       $exists=false;
   }
   if($exists == false)
   {
    if (($password == $cpassword) ) {
        $sql = "INSERT INTO `usernew` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        //   Problem,,result true i hcche na
        $result = mysqli_query($conn, $sql);
        if ($result) {
           
            $showAlert = true;
        } else {
            die(mysqli_error($conn));
        }
    } else {
        $showError = "Password did not match";
            }
    }
    else {
        $showError = "Username already exists";
    }
}
ob_end_flush();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign up</title>
</head>

<body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if ($showAlert) {
        echo '
        <div class="alert alert-success" role="alert">
      Your account is now created!
    </div>';
    }
    if ($showError) {
        echo '
        <div class="alert alert-danger" role="alert">' . $showError . '
       
      </div>';
    }

    ?>
    <div class="container" class="text-center">

        <h1 class="text-center" class="my-4">Sign up to our website</h1>

        <!-- <form action="/authentication/signup.php" method="post"> -->
        <form method="post" style="padding-top:15px; padding-left:30%">
            <div class="mb-6 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text"  maxlength ="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-6 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password"   maxlength ="22"class="form-control" id="password" name="password">
            </div>

            <div class="mb-6 col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="submit">SignUp</button>
            </div>

        </form>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>