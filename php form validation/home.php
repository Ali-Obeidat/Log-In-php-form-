<?php include "include/admin_head.php" ?>
    <?php
     if(isset($_GET['source'])){
        $source= $_GET['source'];

    }else{
        $source= "";
    }
    switch ($source) {
        case "admin":
            include "include/admin.php";
            break;
        case "edit":
            include "include/admin.php";
            include "include/edit.php";
            break;

        default:
            include "include/users.php";
            break;
    }
    
    ?>
<?php include "include/admin.footer.php" ?>