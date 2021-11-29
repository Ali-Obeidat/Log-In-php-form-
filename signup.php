<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        
        if (isset($_POST['submit'])){

            global $infoArray;
            global $emailStatus;
            $email= $_POST['Email'];
            $phone= $_POST['phone'];
            $fname= $_POST['fname'];
            $mname= $_POST['mname'];
            $lname= $_POST['lname'];
            $password= $_POST['password'];
            $confirmPassword= $_POST['ConfirmPassword'];
            $date= $_POST['date'];
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            ////////////////////////////////////////////////////
            if ($email == "" || empty($email)) {
                $emailErr= " This field should not be empty";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else{
                $infoArray['email']=$email ;
            }
            foreach ($_SESSION as $key => $value) {
                if(is_array($value)){
                    if ($email == $value['email']) {
                        $emailErr = "email is used";
                        $emailStatus= false;
                    }else{
                        $emailStatus= true;
                    }
                }
            }

            if ($phone == "" || empty($phone)) {
                $phoneErr= " This field should not be empty";
            }elseif (strlen($phone) < 14 || strlen($phone) > 14 ){
                $phoneErr= " The Mobile Number Should be 14 digits";
            }else {
                $infoArray['phone']=$phone ;
            }
            if ($fname == "" || empty($fname) ) {
                $nameErr= " This field should not be empty";
            }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                $fnameErr = "Only letters and white space allowed";
            }
            ////////////////////////////////////////
            if ($mname == "" || empty($mname) ) {
                $midNameErr= " This field should not be empty";
            }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$mname)) {
                $mnameErr = "Only letters and white space allowed";
            }
            /////////////////////////////////////////////////////
            if ($lname == "" || empty($lname) ) {
                $lastNameErr= " This field should not be empty";
            }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                $lnameErr = "Only letters and white space allowed";
            }
            if (!empty($fname) && !empty($mname) && !empty($lname)
            && preg_match("/^[a-zA-Z-' ]*$/",$fname) && preg_match("/^[a-zA-Z-' ]*$/",$mname) && preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                $fullName = $fname ." ". $mname ." ". $lname;
                $infoArray['fullName']=$fullName ;
            }
            ////////////////////////////////////////////////
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                $passErr="Password must be at least 8 ch and must contain at least one number, upper case letter, lower case letter and special character.";
            }elseif ($password !== $confirmPassword){
                $passError= "tow password dot mach";
            }else {
                $infoArray['password']=$password ;
            }
            if ((date('Y') - date('Y',(int)$date)) < 16){
                $dateError= "your age is under 16";
            }else{
                $infoArray['date']=$date ;
            }
            /////////////////////////
            if (isset($infoArray['phone']) && isset($fullName) && isset($infoArray['email'])
            && isset($infoArray['password']) && $emailStatus== true ){
                $j= rand(0,1000);
                $_SESSION["info{$j}"] =$infoArray ;
                header("location: login.php");
                $emailStatus= false;
                // echo "<pre>";
                // print_r( $_SESSION);
                // echo "</pre>";
            }
        }
    ?>
    <?php 
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    ?>

<div class="container" id="container">
    <div class="head">
    <h1>Sign up</h1>
    <p>Create an Account, its free</p>
    </div>
    <div class="form">
    <form action="" method="post">
        <div class=" col-12">
        <label for="Email" class="form-label">Email</label>
        <input type="Email" class="form-control" id="Email"  name="Email" require value="<?php if(isset($infoArray['email'])){ echo $infoArray['email'];}  ?>">
        <span> <?php global $emailErr ;
            echo $emailErr; ?> </span>
        </div>
            <div class=" col-12">
        <label for="phone" class="form-label">phone</label>
        <input type="number" class="form-control" id="phone"  name="phone" value="<?php if(isset($infoArray['phone'])){ echo $infoArray['phone'];}  ?>" require>
        <span> <?php global $phoneErr ;
         echo $phoneErr; ?> </span>
        </div>
        <div class="name"> 
            <div class=" col-12">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname"  name="fname"value="<?php if(isset($fname)){ echo $fname;}  ?>" require>
        <span> <?php global $nameErr ; global $fnameErr ;
         echo $nameErr;
         echo  $fnameErr; ?> </span>
        </div>
        <div class=" col-12">
        <label for="mname" class="form-label">middle Name</label>
        <input type="text" class="form-control" id="mname"  name="mname" value="<?php if(isset($mname)){ echo $mname;}  ?>" require>
        <span> <?php global $midNameErr ; global $mnameErr ;
         echo $midNameErr;
         echo  $mnameErr; ?> </span>
        </div>
            <div class=" col-12">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname" value="<?php if(isset($lname)){ echo $lname;}  ?>"   name="lname">
        <span> <?php global $lastNameErr ; global $lnameErr ;
         echo $lastNameErr;
         echo  $lnameErr; ?> </span>
        </div>
        </div>
        <div class="">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password"  name="password">
        <span> <?php global $passErr ;
         echo  $passErr; ?> </span>
        </div>
        
        <div class="">
        <label for="Confirm Password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="Confirm Password"  name="ConfirmPassword">
        <span> <?php global $passErr ; global $passError;
         echo  $passErr;
         echo $passError; ?> </span>
        </div>
        <label for="start">Date of Birth:</label>
        <input type="date" id="start" name="date" value="" min="" max="2010-12-31" >
        <span> <?php global $dateError ;
         echo  $dateError; ?> </span>
        <div class="buttons">
       <a href="home.php"><button type="submit" name="submit" class="btn btn-primary">Sign Up</button></a> 
        </div>
    </form>
    </div>
    <p> Already have an account? <a href="login.php">log in</a></p>

</div>
<div>

</body>
<script src="js/main.js"></script>
</html>