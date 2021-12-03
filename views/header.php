<body>
    <?php
    if (!$_SESSION['user']) {
        $_SESSION["loginError"] = "First login else loquesurja ;)";
        header("Location:" . BASE_URL);
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container w-100">
        <a class="navbar-brand" href="#">Employees Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo constant('BASE_URL') . 'dashboard/' ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('BASE_URL') . 'dashboard/newEmployee' ?>">New Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('BASE_URL') . 'user' ?>">Users</a>
                </li>
            </ul>
            <div class="ml-auto text-muted justify-self-end d-flex">
                <a href="<?php echo constant('BASE_URL') . 'user/logOut' ?>">
                    <button type="submit" class="btn" id="btnLogOut">
                        Log out
                    </button>
                </a>
                <h5>Wellcome <?php echo isset($_SESSION['user']) ? $_SESSION['user']['name'] : "KASETUAKI" ?></h5>
            </div>


        </div>
    </nav>

    <div id header>
    </div>