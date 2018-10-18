<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_catagories();?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Catagory</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Catagory">
                            </div>
                        </form><!-- add catagory form -->


                        <?php

                        // showing update form from update_catagory.php file

                        if(isset($_GET['edit'])){
                            $get_cat_id = $_GET['edit'];
                            include "includes/update_catagories.php";
                        }

                        ?>



                    </div> <!-- col-xs-6-->

                    <div class="col-xs-6">



                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Catagory Title</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php // SHOW ALL CATAGORIES
                            show_all_catagories();
                            ?>

                            <?php
                                // DELETE CATAGORY
                            delete_catagories();
                            ?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>