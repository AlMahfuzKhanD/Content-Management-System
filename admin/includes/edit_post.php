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



if(isset($_POST['update_post'])){



//catching data from update form
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_catagory_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];




    move_uploaded_file($post_image_temp, "../images/$post_image");
// not to keep image field empty
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE postId = $get_post_id ";
        $select_image = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_array($select_image)){
            $post_image = $row['postImage'];
        }
    }



//sending catched date to database


    $query = "UPDATE posts SET postTitle='{$post_title}' ,";
    $query .= "postCatagoryId='{$post_catagory_id}' ,";
    $query .= "postAuthor='{$post_author}' ,";
    $query .= "postStatus='{$post_status}' ,";
    $query .= "postTags='{$post_tags}' ,";
    $query .= "postContent='{$post_content}' ,";
    $query .= "postImage='{$post_image}' ";
    $query .= "WHERE postId={$get_post_id}";
    $update_post = mysqli_query($connection,$query);
    query_failed($update_post);

    header("Location:posts.php");


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
                $catId = $row['catId'];
                $catTitle = $row['catTitle'];

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
        <select name="post_status" id="">


            <option value="<?php echo $postStatus;?>"><?php echo $postStatus;?></option>
            <?php
            if($postStatus == 'published'){
                echo "<option value=\"draft\">Draft</option>";

            }else{
                echo "<option value=\"published\">Published</option>";
            }

            ?>



        </select>
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
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $postContent;?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>