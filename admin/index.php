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



                            <small><?php
                                echo $_SESSION['username'];
                                ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php


                                        $query = "SELECT * FROM posts";
                                        $select_all_posts = mysqli_query($connection,$query);
                                        $post_counts = mysqli_num_rows($select_all_posts);



                                        ?>


                                        <div class='huge'><?php echo $post_counts; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php


                                        $query = "SELECT * FROM comments";
                                        $select_all_comments= mysqli_query($connection,$query);
                                        $comments_counts = mysqli_num_rows($select_all_comments);



                                        ?>

                                        <div class='huge'><?php echo $comments_counts; ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php


                                        $query = "SELECT * FROM users";
                                        $select_all_users= mysqli_query($connection,$query);
                                        $users_counts = mysqli_num_rows($select_all_users);



                                        ?>


                                        <div class='huge'><?php echo $users_counts; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php


                                        $query = "SELECT * FROM catagories";
                                        $select_all_catagories= mysqli_query($connection,$query);
                                        $catagories_counts = mysqli_num_rows($select_all_catagories);



                                        ?>

                                        <div class='huge'><?php echo $catagories_counts; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="catagories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- /.row -->
                <?php

                $query = "SELECT * FROM posts WHERE postStatus = 'draft'";
                $select_all_draft_posts = mysqli_query($connection,$query);
                $post_draft_counts = mysqli_num_rows($select_all_draft_posts);

                $query = "SELECT * FROM comments WHERE coment_status = 'Denied'";
                $select_all_denied_comments = mysqli_query($connection,$query);
                $denied_comment_counts = mysqli_num_rows($select_all_denied_comments);

                $query = "SELECT * FROM users WHERE user_role = 'Editor'";
                $select_editor_users= mysqli_query($connection,$query);
                $editor_user_counts = mysqli_num_rows($select_editor_users);



                ?>



                <div class="row">

                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                                <?php

                                $element_text = ['Active Posts','Draft Posts','Comments','Denied Comments','User','Editor','Catagories'];
                                $element_count = [$post_counts,$post_draft_counts,$comments_counts,$denied_comment_counts,$users_counts,$editor_user_counts,$catagories_counts];
                                for($i = 0;$i<7;$i++){

                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }


                                ?>

                               // ['Posts', 1000],

                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>


                    <div id="columnchart_material" style="width:'auto'; height: 500px;"></div>

                </div>


                <!-- /.row -->




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>