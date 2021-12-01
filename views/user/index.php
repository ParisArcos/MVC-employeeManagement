<?php
require_once "views/head.php";
require_once "views/header.php";
?>
<div id="dashboard">
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
            <tr id="addUser">
                <form action="<?php echo constant('BASE_URL'); ?>user/registerUser" method="POST">
                    <td><input type="text" name="name" id="name"></td>
                    <td><input type="email" name="email" id="email"></td>
                    <td><input type="password" name="password" id="password"></td>
                    <td> <input type="submit" value="<?php echo isset($user) ? 'update' : 'create' ?>" id="submit"></td>
                </form>
            </tr>

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

</div>
<script src="<?php echo constant('BASE_URL') ?>assets/js/users.js"></script>

<?php
require_once "views/footer.php";
?>