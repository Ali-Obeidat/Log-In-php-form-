<?php include "include/admin_head.php" ?>
<a href="login.php"> <button  class="btn btn-danger">log out</button></a>
    <?php
        if(isset($_GET['id'])){
            $userName= $_GET['id'];
            ?>
            <h2>Welcome <?php echo $userName ?></h2>
        <?php
        }
        ?>

<?php include "include/admin.footer.php" ?>