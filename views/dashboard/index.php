<?php require_once "views/header.php"; ?>
<div id="dashboard">
    <h1>THIS IS DASHBOARD VIEW</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tbody-users">
            <?php
            foreach ($this->users as $user) {
            ?>
                <tr id="row-<?php echo $user['id']; ?>">
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                    <td><?php echo $user['streetAddress']; ?></td>
                    <td><?php echo $user['city']; ?></td>
                    <td><?php echo $user['state']; ?></td>
                    <td><?php echo $user['postalCode']; ?></td>
                    <td><?php echo $user['phoneNumber']; ?></td>
                    <td><a href="<?php echo constant('BASE_URL') . 'dashboard/showEmployee/' . $user['id']; ?>">Edit</a>
                        <button class="deleteBtn" id="deleteBtn" data-id="<?php echo $user['id']; ?>">Delete</button>

                    </td>
                </tr>

            <?php

            }
            ?>
        </tbody>
    </table>
</div>
<script src="<?php echo constant('BASE_URL') ?>assets/js/dashboard.js"></script>