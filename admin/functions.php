<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 16-Oct-18
 * Time: 5:05 PM
 */

function query_failed($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED ".mysqli_error($connection));
    }
}

function insert_catagories(){


        if(isset($_POST['submit'])){
            global $connection;

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

}

function show_all_catagories(){
    global $connection;
    $query = "SELECT * FROM catagories";
    $select_catagories = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_catagories)){
        $catId = $row['cat_id'];
        $catTitle = $row['cat_title'];

        echo "<tr>";


        echo "<td>{$catId}</td>";
        echo "<td>{$catTitle}</td>";
        echo "<td ><a style='text-decoration: none;' href='catagories.php?delete={$catId}'>Delete</a></td>"; // sending request for delete using "delete key"
        echo "<td><a href='catagories.php?edit={$catId}'>Edit</a></td>"; // sending request for using using "edit key"
        echo "</tr>";
    }
}


function delete_catagories(){
    global $connection;
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM catagories WHERE cat_id = {$get_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:catagories.php"); // refresh page and delete catagory data at one press
    }
}

function delete_posts(){
    global $connection;
    if (isset($_GET['delete'])){

        $get_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE postId = {$get_post_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:posts.php"); // refresh page and delete catagory data at one press

    }
}

