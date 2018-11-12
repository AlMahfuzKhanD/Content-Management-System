<?php
if(isset($_POST['create_post'])){

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_catagory_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../images/$post_image");


    $query = "INSERT INTO posts(postCatagoryId,postTitle,postAuthor,postDate,postImage,postContent,postTags,postStatus)";
    $query .= "VALUE ({$post_catagory_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $create_post_query = mysqli_query($connection,$query);

    query_failed($create_post_query);

    echo "Post Created:" . " " . "<a href='posts.php'>View Posts</a>";



}
?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_catagory">Post Catagory </label>
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
        <input type="text" class="form-control" name="post_author">
    </div>


    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="post_category">


            <option value="draft">Draft</option>
            <option value="published">Published</option>



        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>