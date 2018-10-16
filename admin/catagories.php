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


                            <?php // FIND ALL CATAGORIES QUERY

                            $query = "SELECT * FROM catagories";
                            $select_catagories = mysqli_query($connection,$query);

                            while ($row = mysqli_fetch_assoc($select_catagories)){
                                $catId = $row['cat_id'];
                                $catTitle = $row['cat_title'];

                                echo "<tr>";


                                echo "<td>{$catId}</td>";
                                echo "<td>{$catTitle}</td>";
                                echo "<td><a href='catagories.php?delete={$catId}'>Delete</a></td>"; // sending request for delete using "delete key"
                                echo "<td><a href='catagories.php?edit={$catId}'>Edit</a></td>"; // sending request for using using "edit key"
                                echo "</tr>";
                            }

                            ?>

                            <?php
                                // DELETE QUERY
                                if(isset($_GET['delete'])){
                                    $get_cat_id = $_GET['delete'];
                                    $query = "DELETE FROM catagories WHERE cat_id = {$get_cat_id}";
                                    $delete_query = mysqli_query($connection,$query);
                                    header("Location:catagories.php"); // refresh page and delete catagory data at one press
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