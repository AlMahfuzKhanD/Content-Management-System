
<?php
if(isset($_POST['checkBoxArray'])){
    foreach ($_POST['checkBoxArray'] as $postIdValue ){
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options){
            case 'published':

                $query = "UPDATE posts SET postStatus = '{$bulk_options}' WHERE postId = {$postIdValue} ";
                $update_post_status_publish = mysqli_query($connection,$query);
                query_failed($update_post_status_publish);

                break;

            case 'draft':

                $query = "UPDATE posts SET postStatus = '{$bulk_options}' WHERE postId = {$postIdValue} ";
                $update_post_status_draft = mysqli_query($connection,$query);
                query_failed($update_post_status_draft);

                break;

            case 'delete':

                $query = "DELETE FROM posts WHERE postId = {$postIdValue}";
                $delete_post = mysqli_query($connection,$query);
                query_failed($delete_post);

                break;
        }

    }
}

?>





<form action ="" method ="post">






<table class="table table-bordered table-hover">

    <div style="padding: 0; margin-bottom: 15px" class="col-xs-4" id="bulkOptionsContainer">

        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>

    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>






    <thead>
    <tr>
        <th><input id="selectAllBoxex" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Catagory</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>

    <?php
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $postId = $row['postId'];
        $postAuthor = $row['postAuthor'];
        $postTitle = $row['postTitle'];
        $postCatagoryId = $row['postCatagoryId'];
        $postStatus = $row['postStatus'];
        $postImage = $row['postImage'];
        $postTags= $row['postTags'];
        $postCommentCount = $row['postCommentCount'];
        $postDate = $row['postDate'];
        echo "<tr>";
        echo "<td><input class=\"checkBoxes\" type=\"checkbox\" name='checkBoxArray[]' value='{$postId}'></td>";
        echo "<td>{$postId}</td>";
        echo "<td>{$postAuthor}</td>";
        echo "<td>{$postTitle}</td>";

        //selecting catagory which will be matched with post and printing dynamic catagory in the post

    $query = "SELECT * FROM catagories WHERE cat_id = $postCatagoryId";
    $select_catagories_post_update = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_catagories_post_update)) {
        $catId = $row['cat_id'];
        $catTitle = $row['cat_title'];


        echo "<td>{$catTitle}</td>";}




        echo "<td>{$postStatus}</td>";
        echo "<td><img width='150' src='../images/{$postImage}' alt='image not found'></td>";
        echo "<td>{$postTags}</td>";
        echo "<td>{$postCommentCount}</td>";
        echo "<td>{$postDate}</td>";
        echo "<td><a href='../post.php?p_id={$postId}'>View Post</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$postId}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$postId}'>Delete</a></td>";



        echo "</tr>";

    }
    ?>


    </tbody>
</table>

</form>


<?php
    delete_posts();

?>





