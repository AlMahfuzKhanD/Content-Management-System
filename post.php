<?php include "includes/db.php"; ?>
<?php include "admin/functions.php"; ?>

<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php


            if(isset($_GET['p_id'])){
                $SourcePostId = $_GET['p_id'];


            $query = "SELECT * FROM posts WHERE postId = $SourcePostId";
            $select_all_post_query = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($select_all_post_query)){
                $postTitle = $row['postTitle'];
                $postAuthor = $row['postAuthor'];
                $postDate = $row['postDate'];
                $postImage = $row['postImage'];
                $postContent = $row['postContent'];



                ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $postTitle;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage;?>" alt="">
                <hr>
                <p><?php echo $postContent;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



                <?php
            }}



            ?>





            <!-- Blog Comments -->

            <?php

            // Insert Cmment to specific post
            if (isset($_POST['create_comment'])) {

                $SourcePostId = $_GET['p_id'];

                $coment_author = $_POST['comment_author'];
                $coment_email = $_POST['comment_email'];
                $coment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments (comment_post_id, coment_author, coment_email, coment_content, coment_status, coment_date)
VALUES ($SourcePostId ,'{$coment_author}', '{$coment_email}', '{$coment_content}', 'UNAPPROVE', now())";
                $create_comment_query = mysqli_query($connection, $query);
                query_failed($create_comment_query);


                $query = "UPDATE posts SET	postCommentCount = postCommentCount + 1 WHERE postId = $SourcePostId";
                $update_comment_count_query = mysqli_query($connection,$query);
                query_failed($update_comment_count_query);




            }




            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">

                    <div class="form-group">

                        <input class="form-control" type="text" name="comment_author" placeholder="Your Name">
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="email" name="comment_email" placeholder="Your Email">
                    </div>

                    <div class="form-group">
                        <textarea name="comment_content" class="form-control" rows="3" placeholder="Your Messagae"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

           <!-- #################### show comments catched by id and showing new comment firs as i used comment_id DESC #########-->

            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id = $SourcePostId AND coment_status = 'Apporved' ORDER BY comment_id DESC ";



            $select_comment_query_id = mysqli_query($connection,$query);



            query_failed($select_comment_query_id);

            while($row = mysqli_fetch_array($select_comment_query_id)){
                $comment_date = $row['coment_date'];
                $comment_content = $row['coment_content'];
                $coment_author = $row['coment_author'];




                ?>


                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $coment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>


                <?php
            }


            ?>









        </div>

        <!-- Blog Sidebar Widgets Column -->


        <?php include "includes/sidebar.php" ?>

    </div>

</div>
<!-- /.row -->

<hr>

<?php include "includes/footer.php"; ?>


