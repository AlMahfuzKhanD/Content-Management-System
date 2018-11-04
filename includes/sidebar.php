<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>

        </form> <!-- search form -->
        <!-- /.input-group -->
    </div>


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Login Here</h4>
        <form action="includes/login.php" method="post">
            <div class="form-gorup">
                <input name="username" type="text" class="form-control" placeholder="Enter User Name">

            </div>
            <br>
            <div class="input-group">
                <input name="password" type="text" class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">

                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>

            </div>

        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">

            <?php

            $query = "SELECT * FROM catagories";
            $select_catagories_sidebar = mysqli_query($connection,$query);


            ?>



        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                    while ($row = mysqli_fetch_assoc($select_catagories_sidebar)){
                        $catTitle = $row['cat_title'];
                        $catId = $row['cat_id'];
                        echo "<li><a href='catagory.php?catagory=$catId'>{$catTitle}</a></li>";
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <!--<div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>-->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
   <?php include "widget.php" ?>


</div>