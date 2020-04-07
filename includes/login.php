<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 04-Nov-18
 * Time: 1:25 PM
 */

include "db.php";
session_start();


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "SELECT * FROM users WHERE userName = '{$username}'";
    $select_user_querey = mysqli_query($connection,$query);

    if(!$select_user_querey){
        die("QUERY FAILED". mysqli_error($connection));
    }


    while ($row = mysqli_fetch_array($select_user_querey)){
        $db_user_id = $row['userId'];
        $db_usename = $row['userName'];
        $db_user_password = $row['userPassword'];
        $db_user_firstname = $row['userFirstName'];
        $db_user_lastname = $row['userLastName'];
        $db_user_role = $row['userRole'];

    }


    if($username === $db_usename && $password === $db_user_password ){


        $_SESSION['username'] = $db_usename;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../admin");

    }else{
        header("Location: ../index.php");
    }




}