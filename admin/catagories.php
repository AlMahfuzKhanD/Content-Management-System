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
                        <form action="">
                            <div class="form-group">
                                <label for="cat-title">Add Catagory</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Catagory">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>