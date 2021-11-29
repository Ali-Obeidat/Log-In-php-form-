<?php
session_start();

$_SESSION["admin"] = array(
    "fullName"    => "Ali Huseein Obeidat",
    "date"         => "02/13/1998",
    "email"       => "aliobeidat03@gmail.com",
    "password"    => "Alihobeidat@98",
    "phone"      => "00962799161600"
);
if (isset($_POST["submit"])) {

    foreach ($_SESSION as $key => $value) {

        if ($key == "admin") {
            if (is_array($value)) {
                if ($value["email"] == $_POST["login_email"] && $value["password"] == $_POST["login_password"]) {
                    $_SESSION[$key]["login_date"]=date("Y/m/d h:i:s");
                    $name_id = $_SESSION[$key]["fullName"];
                    header("location:home.php?id=$name_id&source=admin");
                    die();
                }
            }
        } else {
            if (is_array($value)) {
                if ($value["email"] == $_POST["login_email"] && $value["password"] == $_POST["login_password"] ) {
                    $_SESSION[$key]["login_date"]=date("Y/m/d h:i:s");
                    $name_id = $_SESSION[$key]["fullName"];
                    header("location:home.php?id=$name_id");
                    die();
                }
            }
        }
    }
}


?>
 
    <?php 
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
    <div class="head">
    <h1>login</h1>
    <p>Welcome back! login with your credentials</p>
    </div>
    <div class="form">
    <form action="" method="post">
            <div class="mb-3 col-12">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" id="Email" name="login_email">
        </div>
        <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password" name="login_password">
        </div>
        <div class="buttons">
        <button type="submit" name="submit" class="btn btn-primary">login</button>
        </div>
    </form>
    </div>
    <p> Dont have an account? <a href="signup.php">Sign Up</a></p>

</div>

</body>
<script src="js/main.js"></script>
</html>