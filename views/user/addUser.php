<?php
require_once "views/head.php";
require_once "views/header.php";
?>
<div id="main">
    <h1>THIS IS NEW USER VIEW</h1>

    <form action="<?php echo constant('BASE_URL'); ?>user/registerUser" method="POST">
        <div>
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="name">NAME</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password">
        </div>
        <div>

            <input type="submit" value="submit" id="submit">
        </div>
    </form>

</div>
<?php
require_once "views/head.php";
require_once "views/footer.php";
?>