<?php
require_once "views/head.php";
require_once "views/header.php";
?>
<div id="main">
    <h1>EDIT <?php echo $this->user->name ?> DATA</h1>

    <form action="<?php echo constant('BASE_URL'); ?>user/updateUser" method="POST">
        <input type="hidden" name="name" id="name" value="<?php echo $this->user->name ?>">
        <input type="hidden" id="id" name="id" value="<?php echo $this->user->id ?>">
        <div>
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email" value="<?php echo $this->user->email ?>">
        </div>


        <div>
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" value="<?php echo $this->user->password ?>">
        </div>
        <div>

            <input type="submit" value="update" id="submit">
        </div>
    </form>

</div>
<?php
require_once "views/footer.php";
?>