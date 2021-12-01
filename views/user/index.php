<?php
require_once "views/head.php";
require_once "views/header.php";
?>
<div id="dashboard">
    <h1>THIS IS USER VIEW</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tbody-users">


            <?php
            foreach ($this->users as $user) {
            ?>
                <tr id="row-<?php echo $user->name; ?>">
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->password; ?></td>
                    <td><a href="<?php echo constant('BASE_URL') . 'user/showUser/' . $user->name ?>">Edit</a>
                        <button class="deleteBtn" id="deleteBtn" data-userName="<?php echo $user->name; ?>">Delete</button>

                    </td>
                </tr>

            <?php

            }
            ?>
        </tbody>
    </table>
    <a href="<?php echo constant('BASE_URL') . 'user/newUser' ?>"> <button class="btn btn-primary">Add User</button></a>
</div>
<script src="<?php echo constant('BASE_URL') ?>assets/js/users.js"></script>

<?php
require_once "views/footer.php";
?>