<?php
        if (isset($_POST['submit'])){
            global $infoArray;
            global $emailStatus;
            $email= $_POST['Email'];
            $phone= $_POST['phone'];
            $fullName= $_POST['fullName'];
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
            if ($phone == "" || empty($phone)) {
                $phoneErr= " This field should not be empty";
            }elseif (strlen($phone) < 14 || strlen($phone) > 14 ){
                $phoneErr= " The Mobile Number Should be 14 digits";
            }else {
                $infoArray['phone']=$phone ;
            }
            if ($fullName == "" || empty($fullName) ) {
                $fullNameErr= " This field should not be empty";
            }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$fullName)) {
                $fullNameErr = "Only letters and white space allowed";
            }elseif (!empty($fullName) && preg_match("/^[a-zA-Z-' ]*$/",$fullName)  ) {
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

        }
    ?>

<?php
// for edite
$userEdit=$_GET["id"];
print_r($_SESSION[$userEdit]);

if (isset($_POST["submit"])) {
    $_SESSION[$userEdit]["fullName"] =   $_POST["fullName"];
    $_SESSION[$userEdit]["date"]     =   $_POST["date"];
    $_SESSION[$userEdit]["phone"]    =   $_POST["phone"];
    $_SESSION[$userEdit]["email"]    =   $_POST["Email"];
    $_SESSION[$userEdit]["password"] =   $_POST["password"];
    header("location :home.php?source=edit&id=$userEdit");
}

?>

<div class="container" id="container">
    <div class="head">
    <h1>Edit</h1>
    </div>
    <div class="form">
    <form action="" method="post">
        <div class=" col-12">
        <label for="Email" class="form-label">Email</label>
        <input type="Email" class="form-control" id="Email"  name="Email" require value="<?php echo $_SESSION[$userEdit]["email"]; ?>">
        <span> <?php global $emailErr ;
            echo $emailErr; ?> </span>
        </div>
            <div class=" col-12">
        <label for="phone" class="form-label">phone</label>
        <input type="number" class="form-control" id="phone"  name="phone" value="<?php echo $_SESSION[$userEdit]["phone"]; ?>" require>
        <span> <?php global $phoneErr ;
         echo $phoneErr; ?> </span>
        </div>
        <div class="name"> 
            <div class=" col-12">
        <label for="fname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fname"  name="fullName"value="<?php echo $_SESSION[$userEdit]["fullName"];  ?>" require>
        <span> <?php global $nameErr ; global $fnameErr ;
         echo $nameErr;
         echo  $fnameErr; ?> </span>
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
       <a href=""><button type="submit" name="submit" class="btn btn-primary">Update</button></a> 
        </div>
       
    </form>

    <a href="home.php?source=admin" style="padding-top: 10px;" ><button  class="btn btn-primary">close</button></a> 
    </div>
    

</div>
<div>