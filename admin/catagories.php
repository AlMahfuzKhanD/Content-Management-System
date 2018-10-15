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

                        <?php
                            if(isset($_POST['submit'])){

                                $catTitle = $_POST['cat_title'];

                                if($catTitle == "" || empty($catTitle)){
                                    echo "This field should not be empty";
                                }else{
                                    $query = "INSERT INTO catagories(cat_title)"; // inserting data into cat_title column of database
                                    $query .= "VALUE ('{$catTitle}')";

                                    $create_catagory_query = mysqli_query($connection,$query);
                                    if(!$create_catagory_query){
                                        die('QUERY FAILED'. mysqli_error($connection));
                                    }
                                }
                            }
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Catagory</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Catagory">
                            </div>
                        </form>
                    </div> <!-- add catagory form -->

                    <div class="col-xs-6">

                        <?php

                        $query = "SELECT * FROM catagories";
                        $select_catagories = mysqli_query($connection,$query);


                        ?>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Catagory Title</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            while ($row = mysqli_fetch_assoc($select_catagories)){
                                $catId = $row['cat_id'];
                                $catTitle = $row['cat_title'];

                                echo "<tr>";


                                echo "<td>{$catId}</td>";
                                echo "<td>{$catTitle}</td>";
                                echo "</tr>";
                            }

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