<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Catagory</label>

        <?php

        //SELECTING SPECIFIC CATAGORY AND SHOWING IT IN EDIT FORM IF EDIT BUTTON IS CLICKED

        if(isset($_GET['edit'])) {

            $get_cat_id = $_GET['edit'];

            $query = "SELECT * FROM catagories WHERE catId = $get_cat_id";
            $select_catagories_update = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_catagories_update)) {
                $catId = $row['catId'];
                $catTitle = $row['catTitle'];
                ?>

                <input value="<?php if (isset($catTitle)) {
                    echo $catTitle;
                } ?>" type="text" class="form-control" name="cat_title">

                <?php
            }


        }


        ?>


        <?php

        //UPDATE CATAGORY
        if(isset($_POST['update_catagory'])){
            $get_cat_title = $_POST['cat_title'];
            $query = "UPDATE catagories SET catTitle = '{$get_cat_title}' WHERE catId = {$get_cat_id}";
            $update_query = mysqli_query($connection,$query);
            if(!$update_query){
                die("QUERY FAILED".mysqli_error($connection));
            }

        }

        ?>



    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_catagory" value="Update Catagory">
    </div>
</form><!-- update catagory form -->

