<?php


if(isset($_GET['u_id'])) {


    $get_user_id = $_GET['u_id'];

    $query = "SELECT * FROM users WHERE user_id = $get_user_id";
    $select_users_by_id = mysqli_query($connection,$query);
    query_failed($select_users_by_id);

    while ($row = mysqli_fetch_assoc($select_users_by_id)) {

        $user_id = $row['user_id'];
        $username = $row['usename'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
        $user_password = $row['user_password'];


    }


}



if(isset($_POST['update_user'])){



//catching data from update form
    $user_name = $_POST['user_name'];
    $user_role = $_POST['user_role'];
    $user_firstname = $_POST['first_name'];
    $user_lastname = $_POST['last_name'];
    $user_email = $_POST['user_email'];



    $user_password = $_POST['password'];


    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_image_temp, "../images/$user_image");




// not to keep image field empty
    if(empty($user_image)){
        $query = "SELECT * FROM users WHERE user_id = $get_user_id ";
        $select_image = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_array($select_image)){
            $user_image = $row['user_image'];
        }
    }



//sending catched date to database


    $query = "UPDATE users SET usename='{$user_name}' ,";
    $query .= "user_firstname='{$user_firstname}' ,";
    $query .= "user_lastname='{$user_lastname}' ,";
    $query .= "user_email='{$user_email}' ,";
    $query .= "user_role='{$user_role}' ,";
    $query .= "user_image='{$user_image}' ,";
    $query .= "user_password='{$user_password}' ";
    $query .= "WHERE user_id={$get_user_id}";


    $update_user_query = mysqli_query($connection,$query);
    query_failed($update_user_query);

    header("Location:users.php");


}

?>





<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">User Name</label>
        <input value="<?php echo $username;?>" type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <select name="user_role" id="post_category">


            <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
            <option value="Admin">Admin</option>
            <option value="Editor">Editor</option>
            <option value="Subscriber">Subscriber</option>




        </select>
    </div>



    <div class="form-group">
        <label for="first_name">User First Name</label>
        <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">User Last Name</label>
        <input value="<?php echo $user_lastname;?>" type="text" class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="email">User Email</label>
        <input value="<?php echo $user_email;?>" type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input value="<?php echo $user_password;?>" type="password" class="form-control" name="password">
    </div>



    <div class="form-group">
        <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
</form>