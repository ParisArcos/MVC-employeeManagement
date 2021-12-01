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
                <form action="<?php echo constant('BASE_URL'); ?>user/updateUser" method="POST">
                    <td><input type="text" name="name" id="name " value="<?php echo $this->user->name ?>"></td>
                    <td><input type="email" name="email" id="email" value="<?php echo $this->user->email ?>"></td>
                    <td><input type="password" name="password" id="password" value="<?php echo $this->user->password ?>"></td>
                    <td> <input type="submit" value="update" id="submit"></td>
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