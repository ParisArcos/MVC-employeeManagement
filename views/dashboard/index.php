   <div id="dashboard">
       <h1>THIS IS DASHBOARD VIEW</h1>
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
                   <tr id="row-<?php echo $user->user_name; ?>">
                       <td><?php echo $user->user_name; ?></td>
                       <td><?php echo $user->email; ?></td>
                       <td><?php echo $user->user_password; ?></td>
                       <td><a href="<?php echo constant('BASE_URL') . 'dashboard/showUser/' . $user->user_name ?>">Edit</a>
                           <button class="deleteBtn" id="deleteBtn" data-userName="<?php echo $user->user_name; ?>">Delete</button>

                       </td>
                   </tr>

               <?php

                }
                ?>
           </tbody>
       </table>
   </div>
   <script src="<?php echo constant('BASE_URL') ?>public/assets/js/dashboard.js"></script>