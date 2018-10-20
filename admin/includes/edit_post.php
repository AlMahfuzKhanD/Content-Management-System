<?php

if(isset($_GET['p_id'])) {


    $get_post_id = $_GET['p_id'];

$query = "SELECT * FROM posts WHERE postId = $get_post_id";
$select_posts_by_id = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $postId = $row['postId'];
    $postAuthor = $row['postAuthor'];
    $postTitle = $row['postTitle'];
    $postCatagoryId = $row['postCatagoryId'];
    $postStatus = $row['postStatus'];
    $postImage = $row['postImage'];
    $postContent = $row['postContent'];
    $postTags = $row['postTags'];
    $postCommentCount = $row['postCommentCount'];
    $postDate = $row['postDate'];


}


}





?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $postTitle;?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <select name="post_category" id="post_category">

            <?php
            $query = "SELECT * FROM catagories";
            $select_catagories_post_update = mysqli_query($connection, $query);

            query_failed($select_catagories_post_update);

            while ($row = mysqli_fetch_assoc($select_catagories_post_update)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];

                echo "<option value='{$catId}'>{$catTitle}</option>";


            }
            ?>




        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $postAuthor;?>" type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $postStatus;?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $postImage; ?>" alt="">
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $postTags;?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $postContent;?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
    </div>
</form>