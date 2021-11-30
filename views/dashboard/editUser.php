   <div id="main">
       <h1>THIS IS EDIT USER VIEW</h1>

       <form action="<?php echo constant('BASE_URL'); ?>dashboard/updateUser" method="POST">
           <input type="hidden" id="id" name="id" value="<?php echo $this->user->id ?>">
           <div>
               <label for="email">EMAIL</label>
               <input type="email" name="email" id="email" value="<?php echo $this->user->email ?>">
           </div>
           <div>
               <label for="user_name">NAME</label>
               <input type="text" name="user_name" id="user_name" value="<?php echo $this->user->user_name ?>">
           </div>
           <div>
               <label for="password">PASSWORD</label>
               <input type="password" name="password" id="password" value="<?php echo $this->user->user_password ?>">
           </div>
           <div>

               <input type="submit" value="update" id="submit">
           </div>
       </form>

   </div>