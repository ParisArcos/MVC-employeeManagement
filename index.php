<?php

require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";

require_once "config/dbConstants.php";
require_once "config/baseURL.php";

// Session starts
session_start();


if (isset($_SESSION["login_time_stamp"])) {
    $maxTime = $_SESSION["login_time_stamp"] + 10;
    echo $maxTime;
    if (time() == $maxTime) {
        $_SESSION["loginError"] = "Invalid user or password";
        header("Location:" . BASE_URL);
    }
}


// require_once "views/head.php";
$app = new App();
// require_once "views/footer.php";
