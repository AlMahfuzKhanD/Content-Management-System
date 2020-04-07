<?php
if(isset($_POST['create_user'])){

    $user_name = $_POST['user_name'];
    $user_role = $_POST['user_role'];
    $user_firstname = $_POST['first_name'];
    $user_lastname = $_POST['last_name'];
    $user_email = $_POST['user_email'];



    $user_password = $_POST['password'];


    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_image_temp, "../images/$user_image");


    $query = "INSERT INTO users(userName,userPassword,userFirstName,userLastName,userEmail,userImage,userRole)";
    $query .= "VALUE ('{$userName}','{$userPassword}','{$userFirstName}','{$userLastName}','{$userEmail}','{$userImage}','{$userRole}')";
    $create_user_query = mysqli_query($connection,$query);

    query_failed($create_user_query);

    echo "User Created:" . " " . "<a href='users.php'>View Users</a>";



}
?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="post_category">

            <option value="Admin">Admin</option>
            <option value="Editor">Editor</option>
            <option value="Subscriber">Subscriber</option>




        </select>
    </div>



    <div class="form-group">
        <label for="first_name">User First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">User Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="email">User Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>



    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>