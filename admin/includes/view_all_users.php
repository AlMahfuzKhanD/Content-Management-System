<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>User Image</th>
        <th>Edit User</th>
        <th>Delete User</th>



    </tr>
    </thead>

    <tbody>

    <?php
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $usename = $row['usename'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];


        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$usename}</td>";
        echo "<td>{$user_firstname}</td>";






        echo "<td>{$user_lastname}</td>";

        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><img width='150' src='../images/{$user_image}' alt='image not found'></td>";









        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";



        echo "</tr>";

    }
    ?>


    </tbody>
</table>


<?php
delete_users();


?>



