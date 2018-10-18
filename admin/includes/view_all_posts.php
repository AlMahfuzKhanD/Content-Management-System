<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Catagory</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
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
        echo "<td>{$postId}</td>";
        echo "<td>{$postAuthor}</td>";
        echo "<td>{$postTitle}</td>";
        echo "<td>{$postCatagoryId}</td>";
        echo "<td>{$postStatus}</td>";
        echo "<td><img width='150' src='../images/{$postImage}' alt='image not found'></td>";
        echo "<td>{$postTags}</td>";
        echo "<td>{$postCommentCount}</td>";
        echo "<td>{$postDate}</td>";
        echo "<td><a href='posts.php?delete={$postId}'>Delete</a></td>";


        echo "</tr>";

    }
    ?>


    </tbody>
</table>


<?php delete_posts();?>