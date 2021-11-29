<?php session_start();?>
<?php include "include/admin_head.php" ?>
    <div class="container-fluid">
    <a href="login.php"> <button  class="btn btn-danger">log out</button></a>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>date</th>
                                    <th>Password</th>
                                    <th>login_date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                        foreach ($_SESSION as $key => $value) {
                            if (is_array($value)){

                            ?>
                          <tr>
                            <td><?php echo $value["fullName"]?></td>
                            <td><?php echo $value["email"] ?></td>
                            <td><?php echo @$value["phone"] ?></td>
                            <td><?php echo @$value["date"] ?></td>
                            <td><?php echo $value["password"] ?></td>
                            <td><?php echo @$value["login_date"] ?></td>

                            <td>
                                <div class="d-flex">
                                <a href="delete.php?id=<?php echo $key ?>"><button type="submit" name="delete" >delete</button></a>
                                <a href="home.php?source=edit&id=<?php echo $key ?>"><button class="ms-1">edit</button> </a>
                                </div>
                            </td>
                        </tr>

                       <?php
                            }
                     }
                    ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

<?php include "include/admin.footer.php" ?>