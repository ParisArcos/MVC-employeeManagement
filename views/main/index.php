<!-- TODO Application entry point. Login view -->
<?php
if (isset($_SESSION['user'])) {
    header("Location:" . BASE_URL . "dashboard/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management V1</title>
    <link type="text/css" rel="stylesheet" href="jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="jsgrid-theme.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!-- Custom styles for this template -->
    <link href="./assets/css/login.css" rel="stylesheet">

</head>

<body class="text-center">

    <main class="form-signin">
        <form class="" action="<?php echo constant('BASE_URL') . 'user/loginUser' ?>" method="POST">
            <img src="./assets/img/icon employees.png" width="100" height="100" class="me-3" alt="Dani&Marc">
            <h1 class="h3 mb-3 fw-normal text-left">Sign in to your account</h1>

            <?php if (isset($_SESSION['loginError'])) {
                echo "<div class='alert alert-danger'>$_SESSION[loginError]</div>";
                unset($_SESSION['loginError']);
            }
            ?>
            <div class="form-floating">

                <input required type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="name@example.org" data-bs-toggle="tooltip" data-bs-html="true">
                <label for="exampleInputEmail1">Email address</label>

            </div>
            <div class="form-floating">
                <input required type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Contrasenya">
                <label for="exampleInputPassword1">Password</label>
            </div>

            <button type="submit" class="w-100 btn login-btn">Sign in</button>

        </form>
    </main>

</body>

</html>