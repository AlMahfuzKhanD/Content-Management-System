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

    $query = "SELECT * FROM users WHERE usename = '{$username}'";
    $select_user_querey = mysqli_query($connection,$query);

    if(!$select_user_querey){
        die("QUERY FAILED". mysqli_error($connection));
    }


    while ($row = mysqli_fetch_array($select_user_querey)){
        $db_user_id = $row['user_id'];
        $db_usename = $row['usename'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

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