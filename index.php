<?php

require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";

require_once "config/dbConstants.php";
require_once "config/baseURL.php";


require_once "views/head.php";
$app = new App();
require_once "views/footer.php";
