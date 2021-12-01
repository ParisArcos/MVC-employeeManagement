<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container w-100">
        <a class="navbar-brand" href="#">Employees Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo constant('BASE_URL') . 'dashboard' ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo constant('BASE_URL') . 'employee' ?>">New Employee</a>
                </li>
            </ul>

            <a href="../src/library/loginController.php?logOut" class="ml-auto text-muted justify-self-end">
                <button type="submit" class="btn" id="btnLogOut">
                    Log out
                </button>
            </a>
        </div>
    </nav>

    <div id header>
    </div>